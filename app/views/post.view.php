<?php require 'partials/header.php'; ?>
<link rel="stylesheet" href="../public/css/style.css">

<div class="content">
    <div class="container">
                <div class="post">
                        <h2><?= ucfirst($post->title); ?></h2>
                    <h6>by <?= ucfirst($post->author); ?></h6>
                    <small class="date">Published <?= $post->postDate; ?></small>
                    <br>
                        <div class="row">
                            <img src="../public/images/<?= $post->img; ?>" alt="Image" class="col-lg-5" id="post-image">
                            <div class="col-lg-6" id="content"><?= $post->content; ?></div>
                        </div>
                </div>
                <hr class="division">

    </div>
</div>

<?php require 'partials/footer.php'; ?>