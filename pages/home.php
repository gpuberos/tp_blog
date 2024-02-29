    <!-- Pour chaque résultat de la requête SQL (sélection de tous les articles) -->
    <?php foreach (App\Table\Article::getLast() as $post) : ?>

        <!-- Affiche le titre de l'article avec un lien vers son URL -->
        <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>

        <!-- Affiche un extrait du contenu de l'article -->
        <?= $post->extrait; ?>

    <?php endforeach; ?>