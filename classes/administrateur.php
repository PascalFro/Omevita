<?php

/**
 * Description of administrateur
 *
 * @author pascal fromentin
 */
class administrateur {
    // Attributs :
    protected $id = "0";
    protected $nom = "";
    protected $prenom ="";
    protected $password ="";
    protected $admin ="";
    protected $agence ="";
    protected $table = "administrateur";
    
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
            debug("Pas d'administrateur $id trouvé dans la classe $this->table");
            return false;
        }
        // On a une ligne, on initialise les attributs
        $this->id = $id;
        $this->nom = $ligne["nom"];
        $this->prenom = $ligne["prenom"];
        $this->password = $ligne["password"];
        $this->admin = $ligne["admin"];
        $this->agence = $ligne["agence"];
        return true;
    }
    
    public function insert() {
        // Rôle : Insérer un objet de la base données
        // Retour :true ou false
        // Paramètres : Néant
        
        // Construction et préparation de la requête
        $sql = "INSERT INTO `$this->table` SET `nom` = :nom,`prenom` = :prenom,`password` = :password,`admin` = :admin,`agence` = :agence";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution dela requête
        if (!$req->execute([":nom" => $this->nom,":prenom" => $this->prenom,":password" => $this->password,":admin" => $this->admin,":agence" => $this->agence])) {
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
             debug("Administrateur $this->id inéxistant dans la base");
             return false;
         }
        // Construction et préparation de la requête
        $sql = "UPDATE `$this->table` SET `nom` = :nom,`prenom` = :prenom,`password` = :password,`admin` = :admin, `agence` = :agence WHERE `id` = :id";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution dela requête
        if (!$req->execute([":id" => $this->id,":nom" => $this->nom,":prenom" => $this->prenom,":password" => $this->password,":admin" => $this->admin,":agence" => $this->agence])) {
            debug("Erreur d'exécution de la requête sql dans la classe $this->table, méthode update() : $sql");
            return false;
        }
        debug("Mise à jour de l'administrateur $this->id effectuée.");
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
        debug("Administrateur $this->id supprimée.");
        $this->id = "";
        return true;
    }
    
    public function loadFromPost() {
        // Rôle : Charger / modifier les attributs de l'objet par le POST
        // Retour :true ou false
        // Paramètres : Néant
        
        // S'il y a un champ saisit, on récupère sa valeur. Si le champs saisit n'est pas dans le formulaire ou si pas de champs saisit, on garde la valeur actuelle de l'attribut
        $this->nom = litPOST("nom", "$this->nom");
        $this->prenom = litPOST("prenom", $this->prenom);
        $this->password = litPOST("password", $this->password);
        $this->admin = litPOST("admin", $this->admin);
        $this->agence = litPOST("agence", $this->agence);
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
    public function getPrenom() {
        if (isset($this->prenom)) {
        return $this->prenom;
        }
    }
    public function getPassword() {
        if (isset($this->password)) {
        return $this->password;
        }
    }
    public function getAdmin() {
        if (isset($this->admin)) {
        return $this->admin;
        }
    }
    public function getAgence() {
        if (isset($this->agence)) {
        return $this->agence;
        }
    }
    
    // Méthodes diverses
    
    function verifConnexion($login, $password) {
        // Rôle : Vérifie les codes de connexion
        // Retour : true ou false
        // Paramètres :  $nom et $password : les paramètres à vérifier dans la base
        
        // Construction et préparation de la requête
        $sql = "SELECT * FROM `$this->table` WHERE `nom` = :nom AND `password` = :password";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution de la requête
        $req->execute([":nom" => $login, ":password" => $password]);
        // On récupère lmes éléments dans une variable
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if ($ligne) {
            $_SESSION["connect"] = true;
            $_SESSION["id"] = $ligne["id"];
            $_SESSION["nom"] = $ligne["nom"];
            $_SESSION["prenom"] = $ligne["prenom"];
            $_SESSION["admin"] = $ligne["admin"];
            $_SESSION["agence"] = $ligne["agence"];
            return true;
        } else {
            return false;
        }
    }
    
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
        debug("Liste des administrateurs chargée.");
        return true;
    }
    
    public function listFiltree($texte) {
        // Rôle : Constitution d'une liste filtrée
        // Retour : true ou false
        // Paramètres : $texte = texte à rechercher
        
        // Construction et préparation de la requête
        $sql = "SELECT * FROM `$this->table` WHERE `nom` LIKE :texte OR `prenom` = LIKE :texte OR `admin` = LIKE :texte OR `agence` = LIKE :texte";
        global $bdd;
        $req = $bdd->prepare($sql);
        // Exécution dela requête
        if (!$req->execute([":texte" => "%texte%"])) {
            unset($req);
            debug("Erreur de chargement de la liste");
            return false;
        }
        $this->req = $req;
        debug("Liste des adminstrateurs comprenant $texte chargée.");
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
            $this->prenom = "";
            $this->password = "";
            $this->admin = "";
            $this->agence = "";
            return false;
        }
        // On a une ligne, on transfère les valeurs de la ligne dans chaque attribut
        $this->id = $ligne["id"];
        $this->nom = $ligne["nom"];
        $this->prenom = $ligne["prenom"];
        $this->password = $ligne["password"];
        $this->admin = $ligne["admin"];
        $this->agence = $ligne["agence"];
        return true;
    }
}
