    <?php foreach ($db->query('SELECT * FROM articles', 'App\Table\Article') as $post) : ?>
        
        
        <h2><a href="<?php $post->getURL(); ?>"><?= $post->titre; ?></a></h2>
        
        <p><?php $post->getExtrait(); ?></p>
        
        <?php var_dump($post); ?>

    <?php endforeach; ?>