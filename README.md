# Blog

## ob_start() et ob_get_clean()

1. `ob_start()` :
- Cette fonction est utilisée pour **démarrer la mise en mémoire tampon de sortie**.
- En d’autres termes, elle permet de **capturer tout ce qui est affiché sur la page** (comme le HTML, les messages d’erreur, etc.) et de le stocker temporairement dans un tampon.
- Cela peut être utile lorsque vous souhaitez manipuler ou modifier le contenu avant qu’il ne soit envoyé au navigateur.
2. `ob_get_clean()` :
- Une fois que vous avez utilisé `ob_start()` pour mettre en mémoire tampon la sortie, vous pouvez récupérer le contenu stocké avec `ob_get_clean()`.
- Cette fonction **retourne le contenu mis en mémoire tampon** et **efface le tampon**.
- Vous pouvez ensuite l’affecter à une variable, comme dans votre exemple avec `$content`.

```php
// Démarrer la mise en mémoire tampon de sortie
ob_start();

if ($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'single') {
    require '../pages/single.php';
}

// Récupérer le contenu mis en mémoire tampon et effacer le tampon
$content = ob_get_clean();

// On affiche dans notre modèle HTML $content
require '../pages/templates/default.php';
```

**Dans notre exemple** :
1. `ob_start()` capture tout ce qui est généré par les fichiers inclus (home.php ou single.php) et le stocke temporairement.
2. `ob_get_clean()` récupère ce contenu et l’assigne à la variable $content.

**Sources** :
- https://www.php.net/manual/fr/function.ob-start
- https://www.php.net/manual/fr/function.ob-get-clean

## A documenter :
- setFetchMode() : Définit le mode de récupération par défaut pour cette requête. (https://www.php.net/manual/fr/pdostatement.setfetchmode.php)
- __get() est appelée pour lire des données depuis des propriétés inaccessibles (protégées ou privées) ou non existante. (https://www.php.net/manual/fr/language.oop5.overloading.php#object.get)