<?php

/**
 * Description of reference
 *
 * @author Pascal Fromentin
 */
class reference {
        // attributs
    protected $id = 0;
    protected $titre = "";
    protected $photo = "";
    protected $description = "";
    protected $region = "";
    protected $categorie = "";

    // Méthodes
    public $req;
    // Constructeur
    public function __construct($id = null) {
        // Rôle : construction de l'objet
        // Retour : Néant
        // Paramètres : id à charger et null par défaut

        // Si l'id n'est pas nul, on charge l'id avec loadById
        if (!is_null($id)) {
            $this->loadById($id);
        }
    }

    // Méthodes d'accès à la base de données

    public function loadById($id) {
        // Rôle : Charger un objet de la base (initialiser ses attributs) en donnant son id
        // Retour : True si objet trouvé, false sinon
        // Paramètres : $id : id de l'objet à charger

        // Construction et préparation de la requête
        $sql = "SELECT * FROM `acrobat_reference` WHERE `id` = :id";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        // Si échec de la requête
        if (!$req->execute([":id" => $id])) {
            debug("Erreur d'exécution de la requête sql dans la classe reference, méthode loadById : $sql");
            return false;
        }
        // La requête s'est exécutée, on récupère la 1ère ligne
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        // S'il n'y a pas de ligne, on place un débug et on renvoi faux
        if (!$ligne) {
            debug("Pas d'administrateur $id trouvé dans la classe reference !");
            return false;
        }
        $this->id = $id;
        $this->titre = $ligne["titre"];
        $this->photo = $ligne["photo"];
        $this->description = $ligne["description"];
        $this->region = $ligne["region"];
        $this->categorie = $ligne["categorie"];
        return true;
    }

    // Méthode d'insertion

    public function insert() {
        // Rôle : Insérer l'objet de la base
        // Retour : True si réussi, false sinon
        // Paramètres : Néant

        // Vérifier que l'objet à insérer n'existe pas déjà
        if (!empty($this->id)) {
            debug("La référence $this->id existe déjà dans la base");
            return false;
        }
       // Construction et préparation de la requête
        $sql = "INSERT INTO `acrobat_reference` SET `titre` = :titre, `photo` = :photo,`description` = :description, `region` = :region, `categorie` = :categorie";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        // Si échec de la requête
        if (!$req->execute([":titre" => $this->titre, ":photo" => $this->photo, ":description" => $this->description, ":region" => $this->region, ":categorie" => $this->categorie])) {
            debug("Erreur d'exécution de la requête sql dans la classe reference, méthode d'insertion : $sql");
            return false;
        }
        if ($req->rowCount() !== 1) {
            return false;
        }
        $this->id = $bdd->lastInsertId();
        debug("Référence $this->id créée");
        return true;
    }

    // Méthode de mise à jour

    public function update() {
        // Rôle : Mettre à jour l'objet de la base
        // Retour : True si réussi, false sinon
        // Paramètres : Néant

        // Vérifier que l'objet à modifier existe bien déjà
        if (empty($this->id)) {
            debug("La référence $this->id n'existe dans la base");
            return false;
        }
       // Construction et préparation de la requête
        $sql = "UPDATE `acrobat_reference` SET `titre` = :titre, `photo` = :photo,`description` = :description, `region` = :region, `categorie` = :categorie WHERE `id` = :id";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        // Si échec de la requête
        if (!$req->execute([":id" => $this->id, ":titre" => $this->titre, ":photo" => $this->photo, ":description" => $this->description, ":region" => $this->region, ":categorie" => $this->categorie])) {
            debug("Erreur d'exécution de la requête sql dans la classe reference, méthode de mise à jour : $sql");
            return false;
        }
        // La requête s'est exécutée
        debug("Modifications pour la référence $this->id effectuéées");
        return true;
    }

    // Méthode de suppression

    public function delete() {
        // Rôle : Supprime l'objet de la base
        // Retour : True si réussi, false sinon
        // Paramètres : Néant

        // Vérifier que l'objet à insérer existe bien déjà
        if (empty($this->id)) {
            debug("La référence $this->id n'existe dans la base");
            return false;
        }
       // Construction et préparation de la requête
        $sql = "DELETE * FROM `acrobat_reference` WHERE `id` = :id";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        // Si échec de la requête
        if (!$req->execute([":id" => $this->id])) {
            debug("Erreur d'exécution de la requête sql dans la classe reference, méthode de suppression : $sql");
            return false;
        }
        if ($req->rowCount() !== 1) {
            return false;
        }
        debug("Référence $this->id supprimée");
        $this->id = "";
        return true;
    }

    // Méthode de chargement via un formulaire

    public function loadFromPost() {
        // Rôle : charger les attributs de l'objet depuis le POST (formulaire)
        // Retour : True ou false
        // Paramètres : Néant

        // S'il y a un champ saisi, on récupère sa valeur
        // Si le champs saisi n'est pas dans le formulaire ou si pas de champ saisi, on garde la valeur actuelle de l'attribut comme valeur par défaut
        $this->titre = litPOST("titre", $this->titre);
        $this->photo = litFILES("photo", $this->photo);
        $this->description = litPOST("description", $this->description);
        $this->region = litPOST("region", $this->region);
        $this->categorie = litPOST("categorie", $this->categorie);
        debug("Contenu du formulaire chargé" .print_r($this, true));
        return true;
    }

    // Getters
    // Rôle des getters : Récupérer l'attribut correspondant ou une valeur par défaut
    // Retour : la valeur de l'attribut
    // Paramètres : Néant

    public function getId() {
        return $this->id;
    }
    public function getTitre() {
        return $this->titre;
    }
    public function getPhoto() {
        return $this->photo;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getRegion() {
        return $this->region;
    }
    public function getCategorie(){
    return $this->categorie;
    }

    // Méthodes diverses

    //Méthode popur constituer une liste complète

    public function listAll() {
        // Rôle : Chargement d'une liste complète
        // Retour : true ou false
        // Paramètres : Néant

        // Construction et préparation de la requête
        $sql = "SELECT * FROM `acrobat_reference`";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        // Si échec de la requête
        if (!$req->execute()) {
            unset($req);
            debug("Erreur de chargement de la liste dans la classe reference, méthode listAll : $sql");
            return false;
        }
        $this->req = $req;
        debug("Liste des références chargée");
        return true;
    }

    //Méthode popur constituer une liste complète

    public function listFiltre($texte) {
        // Rôle : Rechercher dans la base les valeurs contenant un texte donné
        // Retour : true ou false
        // Paramètres : $texte : texte à rechercher


        // Construction et préparation de la requête
        $sql = "SELECT * FROM `acrobat_reference` WHERE `titre` LIKE :texte OR `photo` LIKE :texte OR `description` LIKE :texte OR `region` LIKE :texte OR `categorie` LIKE :texte";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        // Si échec de la requête
        if (!$req->execute([":texte" => "%$texte%"])) {
            unset($req);
            debug("Erreur de chargement de la liste dans la classe reference, méthode listFilre : $sql");
            return false;
        }
        $this->req = $req;
        debug("Liste des références comprenant $texte chargée");
        return true;
    }

    // Méthode pour charger la ligne suivante

    public function next() {
        // Rôle : Charger la ligne suivante dans la liste active (si la ligne existe et à un suivant)
        // Retour : true ou false si pas d'objet dans la table
        // Paramètres : Néant

        // A t'on une liste ?
        if (empty ($this->req)) {
            return false;
        }
        // On a une liste, on tente la ligne suivante
        $ligne = $this->req->fetch(PDO::FETCH_ASSOC);
        // Si la ligne n'existe pas, on vide la valeur des champs et on renvoie false
        if ($ligne === false) {
            $this->id = 0;
            $this->titre = "";
            $this->photo = "";
            $this->description = "";
            $this->region = "";
            $this->categorie = "";
            return false;
        }
        // On a une ligne, on transfère la valeur de chaque champ de la ligne dans l'objet
        $this->id = $ligne["id"];
        $this->titre = $ligne["titre"];
        $this->photo = $ligne["photo"];
        $this->description = $ligne["description"];
        $this->region = $ligne["region"];
        $this->categorie = $ligne["categorie"];
        return true;
    }
}
