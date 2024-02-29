<?php

namespace App\Table;

use \App\App;

class Categorie
{
    public $id;
    public $titre;
    public $url;
    
    private static $table = 'categories';

    public static function getAll()
    {
        return App::getDb()->query("SELECT * FROM " . self::$table . "",__CLASS__);
    }
}
