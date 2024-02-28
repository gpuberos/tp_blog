<?php

// Inclusion du fichier Autoloader.php pour charger automatiquement les classes
require '../app/Autoloader.php';

// Enregistrement de l'autoloader (chargement automatique des classes)
App\Autoloader::register();

// Vérification de la présence du paramètre 'p' dans l'URL
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    // Par défaut, afficher la page d'accueil
    $p = 'home';
}

// Initialisation de l'objet Database avec le nom de la base de données 'db_blog'
$db = new App\Database('db_blog');

// Démarrage de la mise en mémoire tampon de sortie
// https://www.php.net/manual/fr/function.ob-start
ob_start();

// Inclusion de la page correspondante en fonction du paramètre 'p'
if($p === 'home') {
    // Afficher la page d'accueil
    require '../pages/home.php';
} elseif ($p === 'single') {
    // Afficher la page d'un article individuel
    require '../pages/single.php';
}

// Récupération du contenu mis en mémoire tampon et effacement du tampon
// https://www.php.net/manual/fr/function.ob-get-clean
$content = ob_get_clean();

// Affichage du contenu dans notre modèle HTML (template) qui contient $content
require '../pages/templates/default.php';