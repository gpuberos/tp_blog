<?php

namespace App;

class Autoloader
{
    // Méthode pour enregistrer l'autoloader
    static function register()
    {
        // Utilise spl_autoload_register() pour lier la méthode "autoload" à l'autoloader
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    // Méthode d'autoloading
    static function autoload($class)
    {
        // Vérifie si le nom de classe commence par le namespace de l'application
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            // Supprime le namespace de la classe
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            // Remplace les antislashs par des slashes pour construire le chemin du fichier
            $class = str_replace('\\', '/', $class);
            // Inclut le fichier correspondant à la classe
            require __DIR__ . '/' . $class . '.php';
        }
    }
}
