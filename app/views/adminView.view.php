<?php require 'partials/adminheader.php'; ?>

<div class="container"> 
    <?php foreach($data as $post) : ?>
        <h2><?= ucfirst($post->title); ?></h2>
        <h6>by <?= ucfirst($post->author); ?></h6>
        <span style="font-size:14px;">Published <?= $post->postDate; ?></pan>
        <br>
        <hr>
        <img src="../public/images/<?= $post->image; ?>" alt="Image" class="col-lg-4">
        <p><?= $post->content; ?></p>
    <?php endforeach; ?>
</div>

<?php require 'partials/footer.php'; ?>