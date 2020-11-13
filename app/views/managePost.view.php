<?php require 'partials/adminheader.php'; ?>
<link rel="stylesheet" href="../public/css/adminpost.css">

<?php if(isset($message)) : ?>
    <?= $message; ?>
<?php endif; ?>

<div class="container-fluid">
    <button class="btn btn-primary" onclick="window.location.href='addPost'">Add New</button>
        <div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>View</th>
                        <th></th>
                        <th>Change Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 0; ?>
                    <?php foreach($data as $post) : ?>
                        <tr>
                            <td><?= $num+= 1; ?></td>
                            <td><?= ucfirst($post->author); ?></td>
                            <td><?= ucfirst($post->title); ?></td>
                            <td><?= $post->tag; ?></td>
                            <td><?= ucfirst($post->stat); ?></td>
                            <td class="img"><img src="../public/images/<?= $post->img; ?>" alt="Image"></td>
                            <td class="date"><?= $post->postDate; ?></td>
                            <td>
                                <a href="view?post=<?= $post->title; ?>">View</a>
                            </td>
                            <td>
                                <button class="btns" onclick="window.location.href='edit?post=<?= $post->title; ?>'"><i class="fas fa-edit"></i></button>
                            </td>
                            <td>
                                <?php if($post->stat === 'draft') : ?>
                                    <a href="status?status=published&id=<?= $post->id; ?>">Publish</a>
                                <?php elseif ($post->stat === 'published') : ?>
                                    <a href="status?status=draft&id=<?= $post->id; ?>">Draft</a>
                                <?php endif; ?>
                            </td>
                            <td class="delete">
                                <button class="btns" onclick="window.location.href='delete?id=<?= $post->id; ?>'"><i class="fas fa-trash fa-lg"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>

<?php require 'partials/footer.php'; ?>