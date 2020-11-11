<?php require 'partials/header.php'; ?>
<link rel="stylesheet" href="../public/css/index.css">

<div class="content">
    <div class="container">
            <?php foreach($data as $post) : ?>
                <div class="post">
                    <a href="post?post=<?= $post->title; ?>">
                        <h2><?= ucfirst($post->title); ?></h2>
                    </a>
                    <h6>by <?= ucfirst($post->author); ?></h6>
                    <small class="date">Published <?= $post->postDate; ?></small>
                    <!-- <hr> -->
                    <div class="row">
                        <img src="../public/images/<?= $post->image; ?>" alt="Image" class="col-lg-4">
                        <div class="col-lg-8"><?= substr($post->content, 0, 500) . '...'; ?>
                            <br>

                            <button class="btn btn-primary" onclick="window.location.href='post?post=<?= $post->title; ?>'" >Read More <i class="fas fa-chevron-right"></i></button>
                        </div>
                        
                    </div>
                </div>
                <hr class="division">
            <?php endforeach; ?>
    </div>
</div>

<?php require 'partials/footer.php'; ?>