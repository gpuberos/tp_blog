<?php

namespace App\Table;

use \App\App;

class Categorie extends Table
{
    public $id;
    public $titre;
    public $url;
    
    protected static $table = 'categories';

    // Méthode pour obtenir l'URL de l'article
    public function getURL()
    {
        return 'index.php?p=categorie&id=' . $this->id;
    }
}
