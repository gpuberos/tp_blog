<?php

require '../app/Autoloader.php';

App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

// Démarrer la mise en mémoire tampon de sortie
// https://www.php.net/manual/fr/function.ob-start
ob_start();

if($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'single') {
    require '../pages/single.php';
}

// Récupérer le contenu mis en mémoire tampon et effacer le tampon
// https://www.php.net/manual/fr/function.ob-get-clean
$content = ob_get_clean();

// On affiche dans notre modèle HTML $content
require '../pages/templates/default.php';