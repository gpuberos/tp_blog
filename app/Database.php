<?php

namespace App;

// Utilise la classe PDO pour la connexion à la base de données
use \PDO;

class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $db_port;
    private $pdo;

    // Constructeur de la classe Database
    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost', $db_port = "3306")
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        $this->db_port = $db_port;
    }

    // Méthode privée pour obtenir l'objet PDO (connexion à la base de données)
    private function getPDO()
    {
        // Si l'objet PDO est strictement null
        if ($this->pdo === null) {
            // Crée un nouvel objet PDO pour la connexion
            $pdo = new PDO('mysql:dbname=db_blog;host=localhost;port=3306', 'root', 'root');

            // Configure le mode d'erreur pour afficher les exceptions en cas de problème
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Stocke l'objet PDO dans la propriété $pdo
            $this->pdo = $pdo;
        }

        // Retourne l'objet PDO
        return $this->pdo;
    }

    // Méthode pour exécuter une requête SQL et récupérer les résultats sous forme d'objets
    public function query($statement, $class_name)
    {
        // Exécute la requête SQL
        $req = $this->getPDO()->query($statement);

        // Récupère les résultats sous forme d'objets de la classe spécifiée ($class_name)
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);

        // Retourne les données
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name, $one = false)
    {
        // Prépare la requête SQL en utilisant la connexion PDO
        $req = $this->getPDO()->prepare($statement);

        // Exécute la requête avec les attributs fournis
        $req->execute($attributes);

        // Définit le mode de récupération des résultats comme des objets de la classe spécifiée
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        // Si l'argument $one est vrai, récupère un seul résultat
        if ($one) {
            $datas = $req->fetch();
        } else {
            // Sinon, récupère tous les résultats
            $datas = $req->fetchAll();
        }

        // Retourne les données récupérées
        return $datas;
    }
}
