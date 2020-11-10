<?php require 'partials/header.php'; ?>
<link rel="stylesheet" href="../public/css/index.css">

<div class="content">
    <div class="container">
            <?php foreach($data as $post) : ?>
                <div class="post">
                    <a href="">
                        <h2><?= ucfirst($post->title); ?></h2>
                    </a>
                    <h6>by <?= ucfirst($post->author); ?></h6>
                    <small class="date">Published <?= $post->postDate; ?></small>
                    <!-- <hr> -->
                    <div class="row">
                        <img src="../public/images/<?= $post->image; ?>" alt="Image" class="col-lg-6">
                        <p class="col-lg-6"><?= substr($post->content, 0, 300) . '...'; ?>
                        <br>
                            <button class="btn btn-primary" onclick="window.location.href='post?post=<?= $post->title; ?>'" >Read More <i class="fas fa-chevron-right"></i></button>
                        </p>
                        
                    </div>
                </div>
                <hr class="division">
            <?php endforeach; ?>
    </div>
</div>

<?php require 'partials/footer.php'; ?>