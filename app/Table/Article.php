<?php

namespace App\Table;

use \App\App;

class Article extends Table
{
    public $id;
    public $titre;
    public $contenu;
    public $date;
    public $categorie;

    public static function getLast()
    {
        return App::getDb()->query("SELECT 
                                    articles.id, 
                                    articles.titre, 
                                    articles.contenu, 
                                    categories.titre as categorie 
                                    FROM articles 
                                    LEFT JOIN categories ON category_id = categories.id", 
                                    __CLASS__);
    }

    // Méthode magique __get
    public function __get($key)
    {
        // Construit le nom de la méthode à appeler (ex: getURL)
        $method = 'get' . $key;
        // Appelle la méthode correspondante (si elle existe) pour récupérer la valeur de la propriété
        return $this->$method();
    }

    // Méthode pour obtenir l'URL de l'article
    public function getURL()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    // Méthode pour obtenir un extrait du contenu de l'article
    public function getExtrait()
    {
        // Récupère les 100 premiers caractères du contenu et ajoute un lien "Voir la suite"
        $html = '<p>' . substr($this->contenu, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}
