<div class="row">
    <div class="col-sm-8">
        <!-- Pour chaque résultat de la requête SQL (sélection de tous les articles) -->
        <?php foreach (App\Table\Article::getLast() as $post) : ?>

            <!-- Affiche le titre de l'article avec un lien vers son URL -->
            <h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
            <p><em><?= $post->categorie; ?></em></p>

            <!-- Affiche un extrait du contenu de l'article -->
            <?= $post->extrait; ?>

        <?php endforeach; ?>
    </div>

    <div class="com-sm-4">
        <ul>
            <?php foreach (\App\Table\Categorie::getAll() as $categorie) : ?>
                <li>
                    <a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>