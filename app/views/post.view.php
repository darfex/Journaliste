<?php require 'partials/header.php'; ?>
<link rel="stylesheet" href="../public/css/index.css">

<div class="content">
    <div class="container">
                <div class="post">
                        <h2><?= ucfirst($post->title); ?></h2>
                    <h6>by <?= ucfirst($post->author); ?></h6>
                    <small class="date">Published <?= $post->postDate; ?></small>
                    <br>
                    <!-- <hr> -->
                        <img src="../public/images/<?= $post->image; ?>" alt="Image" class="col-lg-4">
                        <p class="col-lg-12"><?= $post->content; ?></p>
                </div>
                <hr class="division">

    </div>
</div>

<?php require 'partials/footer.php'; ?>