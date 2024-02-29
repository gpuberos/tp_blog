<?php

namespace App\Table;

use \App\App;

class Table
{
    public $id;
    public $titre;
    public $contenu;
    public $date;
    public $categorie;

    protected static $table;

    private static function getTable() 
    {
        if (self::$table === null) {
            self::$table = __CLASS__;
            die(self::$table);
        }
        return self::$table;
    }

    public static function getAll()
    {
        return App::getDb()->query("SELECT * FROM " . self::getTable() . "", __CLASS__);
    }

    // Méthode magique __get
    public function __get($key)
    {
        // Construit le nom de la méthode à appeler (ex: getURL)
        $method = 'get' . $key;
        // Appelle la méthode correspondante (si elle existe) pour récupérer la valeur de la propriété
        return $this->$method();
    }

}
