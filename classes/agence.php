<?php
/**
 * Description of agence
 *
 * @author pascal fromentin
 */
class agence {
    // Attributs :
    protected $id = "0";
    protected $nom = "";
    protected $description ="";
    protected $photo ="";
    protected $adresse ="";
    protected $cp ="0";
    protected $ville ="";
    protected $horaires ="";
    protected $prestation1 ="";
    protected $prestation2 ="";
    protected $prestation3 ="";
    protected $prestation4 ="";
    protected $table = "agence";
    
    //Gestion des listes
    public $req; 
    
    // Méthodes
    
    public function __construct($id = null) {
        // Rôle : Construction de l'objet
        // Retour : Néant
        // Paramètres :  $id
        
        if (!is_null($id)) {
            $this->loadById($id);
        }
}

    // Méthodes d'accès à la base de données

    public function loadById($id) {
        // Rôle : Charger un objet de la base données
        // Retour :true ou false
        // Paramètres : $id id de l'objet à charger
        
        // Construction et préparation de la requête
        $sql = "SELECT * FROM `$this->table` WHERE `id` = :id";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        if (!$req->execute([":id" => $id])) {
            debug("Erreur d'exécution de la requête sql dans la classe $this->table, méthode loadById() : $sql");
            return false;
        }
        // On récupère lmes éléments dans une variable
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if (!$ligne) {
            debug("Pas d'agence $id trouvée dans la classe $this->table");
            return false;
        }
        // On a une ligne, on initialise les attributs
        $this->id = $id;
        $this->nom = $ligne["nom"];
        $this->description = $ligne["description"];
        $this->photo = $ligne["photo"];
        $this->adresse = $ligne["adresse"];
        $this->cp = $ligne["cp"];
        $this->ville = $ligne["ville"];
        $this->horaires = $ligne["horaires"];
        $this->prestation1 = $ligne["prestation1"];
        $this->prestation2 = $ligne["prestation2"];
        $this->prestation3 = $ligne["prestation3"];
        $this->prestation4 = $ligne["prestation4"];
        return true;
}

     public function insert() {
        // Rôle : Insérer un objet de la base données
        // Retour :true ou false
        // Paramètres : Néant
        
        // Construction et préparation de la requête
        $sql = "INSERT INTO `$this->table` SET `nom` = :nom,`description` = :description,`photo` = :photo,`adresse` = :adresse,`cp` = :cp,`ville` = :ville,`horaires` = :horaires,`prestation1` = :prestation1,`prestation2` = :prestation2,`prestation3` = :prestation3,`prestation4` = :prestation4";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution dela requête
        if (!$req->execute([":nom" => $this->nom,":description" => $this->description,":photo" => $this->photo,":adresse" => $this->adresse,":cp" => $this->cp,":ville" => $this->ville,":horaires" => $this->horaires,":prestation1" => $this->prestation1,":prestation2" => $this->prestation2,":prestation3" => $this->prestation3,":prestation4" => $this->prestation4])) {
            debug("Erreur d'exécution de la requête sql dans la classe $this->table, méthode insert() : $sql");
            return false;
        }
        // On vérifie qu'on a un et un seul objet inséré
        if ($req->rowCount() !== 1) {
            debug("Erreur d'insertion de l'objet dans la base");
            return false;
        }
        $this->id = $bdd->lastInsertId();
        debug("Agence $this->id créée.");
        return true;
        }
        
     public function update() {
        // Rôle : Mettre à jour l'objet dans la base données
        // Retour :true ou false
        // Paramètres : Néant
        
        // Vérifier que l'objet à mettre à jour existe bien
         if (empty($this->id)) {
             debug("Agence $this->id inéxistante dans la base");
             return false;
         }
        // Construction et préparation de la requête
        $sql = "UPDATE `$this->table` SET `nom` = :nom,`description` = :description,`photo` = :photo,`adresse` = :adresse,`cp` = :cp,`ville` = :ville,`horaires` = :horaires,`prestation1` = :prestation1,`prestation2` = :prestation2,`prestation3` = :prestation3,`prestation4` = :prestation4 WHERE `id` = :id";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution dela requête
        if (!$req->execute([":id" => $this->id,":nom" => $this->nom,":description" => $this->description,":photo" => $this->photo,":adresse" => $this->adresse,":cp" => $this->cp,":ville" => $this->ville,":horaires" => $this->horaires,":prestation1" => $this->prestation1,":prestation2" => $this->prestation2,":prestation3" => $this->prestation3,":prestation4" => $this->prestation4])) {
            debug("Erreur d'exécution de la requête sql dans la classe $this->table, méthode update() : $sql");
            return false;
        }
        debug("Mise à jour de l'agence $this->id effectuée.");
        return true;
    }

    public function delete() {
        // Rôle : Supprimer un objet de la base données
        // Retour :true ou false
        // Paramètres : Néant
        
        // Construction et préparation de la requête
        $sql = "DELETE FROM `$this->table` WHERE `id` = :id";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution dela requête
        if (!$req->execute([":id" => $this->id])) {
            debug("Erreur d'exécution de la requête sql dans la classe $this->table, méthode delete() : $sql");
            return false;
        }
        // On vérifie qu'on a un et un seul objet inséré
        if ($req->rowCount() !== 1) {
            debug("La suppression de l'objet a échoué dans la classe $this->table, méthode delete() : $sql");
            return false;
        }
        debug("Agence $this->id supprimée.");
        $this->id = "";
        return true;
    }
        
        
    public function loadFromPost() {
        // Rôle : Charger / modifier les attributs de l'objet par le POST
        // Retour :true ou false
        // Paramètres : Néant
        
        // S'il y a un champ saisit, on récupère sa valeur. Si le champs saisit n'est pas dans le formulaire ou si pas de champs saisit, on garde la valeur actuelle de l'attribut
        $this->nom = litPOST("nom", "$this->nom");
        $this->description = litPOST("description", $this->description);
        $this->photo = litFILES("photo", $this->photo);
        $this->adresse = litPOST("adresse", $this->adresse);
        $this->cp = litPOST("cp", $this->cp);
        $this->ville = litPOST("ville", $this->ville);
        $this->horaires = litPOST("horaires", $this->horaires);
        $this->prestation1 = litPOST("prestation1", $this->prestation1);
        $this->prestation2 = litPOST("prestation2", $this->prestation2);
        $this->prestation3 = litPOST("prestation3", $this->prestation3);
        $this->prestation4 = litPOST("prestation4", $this->prestation4);
        debug("Contenu du formulaire chargé : ".print_r($this, true));
    }
    
    // Les Getters
        // Rôle des getters : Récupère l'attribut correspondant ou une valeur par défaut
        // Retour :  La valeur de l'attribut
        // Paramètres : Nénat
    
    public function getId() {
        if (isset($this->id)) {
        return $this->id;
        }
    }
    public function getNom() {
        if (isset($this->nom)) {
        return $this->nom;
        }
    }
    public function getDescription() {
        if (isset($this->description)) {
        return $this->description;
        }
    }
    public function getPhoto() {
        if (isset($this->photo)) {
        return $this->photo;
        }
    }
    public function getAdresse() {
        if (isset($this->adresse)) {
        return $this->adresse;
        }
    }
    public function getCp() {
        if (isset($this->cp)) {
        return $this->cp;
        }
    }
    public function getVille() {
        if (isset($this->ville)) {
        return $this->ville;
        }
    }
    public function getHoraires() {
        if (isset($this->horaires)) {
        return $this->horaires;
        }
    }
    public function getPrestation1() {
        if (isset($this->prestation1)) {
        return $this->prestation1;
        }
    }
    public function getPrestation2() {
        if (isset($this->prestation2)) {
        return $this->prestation2;
        }
    }
    public function getPrestation3() {
        if (isset($this->prestation3)) {
        return $this->prestation3;
        }
    }
    public function getPrestation4() {
        if (isset($this->prestation4)) {
        return $this->prestation4;
        }
    }
    
    
    // Méthodes diverses
    
    public function listAll() {
        // Rôle : Constitution d'une liste complète
        // Retour : true ou false
        // Paramètres : Néant
        
        // Construction et préparation de la requête
        $sql = "SELECT * FROM `$this->table`";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        if (!$req->execute()) {
            unset($req);
            debug("Erreur de chargement de la liste");
            return false;
        }
        $this->req = $req;
        debug("Liste des agences chargée.");
        return true;
    }
    
    public function listFiltree($texte) {
        // Rôle : Constitution d'une liste filtrée
        // Retour : true ou false
        // Paramètres : $texte = texte à rechercher
        
        // Construction et préparation de la requête
        $sql = "SELECT * FROM `$this->table` WHERE `nom` LIKE :texte OR `description` LIKE :texte OR `photo` LIKE :texte OR `adresse` LIKE :texte OR `cp` LIKE :texte OR `ville` LIKE :texte OR `horaires` LIKE :texte OR `prestation1` LIKE :texte OR `prestation2` LIKE :texte OR `prestation3` LIKE :texte OR `prestation4` LIKE :texte";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution dela requête
        if (!$req->execute([":texte" => "%$texte%"])) {
            print_r($req);
            unset($req);
            debug("Erreur de chargement de la liste");
            return false;
        }
        $this->req = $req;
        debug("Liste des agences comprenant $texte chargée.");
        return true;
    }
    
    
    public function next() {
        // Rôle : Charger la ligne suivante dans la liste active (si la liste existe et a un suivant)
        // Retour : true ou false
        // Paramètres : Néant
        
        // S'il n'y a rien dans la requête de l'objet courant, on retourne faux
        if (empty($this->req)) {
            return false;
        }
        // On a une liste, on tente la ligne suivante

        $ligne = $this->req->fetch(PDO::FETCH_ASSOC);
        // Si pas de ligne suivante, on vide la valeur de tous les champs de l'objet courant
        if ($ligne === false) {
            $this->id = 0;
            $this->nom = "";
            $this->description = "";
            $this->photo = "";
            $this->adresse = "";
            $this->cp = "";
            $this->ville = "";
            $this->horaires = "";
            $this->prestation1 = "";
            $this->prestation2 = "";
            $this->prestation3 = "";
            $this->prestation4 = "";
            return false;
        }
        // On a une ligne, on transfère les valeurs de la ligne dans chaque attribut
        $this->id = $ligne["id"];
        $this->nom = $ligne["nom"];
        $this->description = $ligne["description"];
        $this->photo = $ligne["photo"];
        $this->adresse = $ligne["adresse"];
        $this->cp = $ligne["cp"];
        $this->ville = $ligne["ville"];
        $this->horaires = $ligne["horaires"];
        $this->prestation1 = $ligne["prestation1"];
        $this->prestation2 = $ligne["prestation2"];
        $this->prestation3 = $ligne["prestation3"];
        $this->prestation4 = $ligne["prestation4"];
        return true;
    }

}
