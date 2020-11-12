<?php 
require 'partials/adminheader.php'; 
?>
<link rel="stylesheet" href="../public/css/post.css">


<div class="container-fluid">

    <h2>Update Post</h2>
    <hr>

    <form action="update-post" method="POST">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?= $post->title; ?>" required>

        <label for="tag">Post Tags</label>
        <input type="text" class="form-control" name="tag" value="<?= $post->tag; ?>">

        <select name="role" id="" clas="form-control">
                <option value="published">Publish</option>
                <option value="draft">Save as Draft</option>
        </select>
        <br>

        <label>Image</label>
        <br>
        <img src="../public/images/<?= $post->image; ?>" alt="Image">

        <br>
        <input type="file" name="image">
        <br>
        
        <label for="content">Post Content</label>
        <textarea name="content"  id="" rows="15" required><?= $post->content; ?></textarea>

        <br>
        <button class="btn btn-success" type="submit">Update</button>
    </form>
    
</div>


<?php require 'partials/footer.php'; ?>