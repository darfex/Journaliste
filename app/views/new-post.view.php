<?php 
require 'partials/adminheader.php'; 
?>
<link rel="stylesheet" href="../public/css/post.css">


<div class="container-fluid">
    <?php if (isset($message)) : ?>
    <small style="color:red"><?= $message; ?></small>
    <?php endif; ?>

    <h2>Add new Post</h2>
    <hr>

    <form action="add-post" method="POST">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title" required>

        <label for="image">Add Image</label> <small>(Not more than 5mb)</small>
        <br>
        <input type="file" name="image" required>
        <br>

        <label for="tag">Post Tags</label>
        <input type="text" class="form-control" name="tag" placeholder="Enter some tags separated by comma (,)">

        <label for="content">Post Content</label>
        <textarea name="content"  id="" rows="15" required></textarea>

        <select name="role" id="" clas="form-control">
            <option value="published">Publish</option>
            <option value="draft">Save as Draft</option>
        </select>

        <br>
        <button class="btn btn-success" type="submit">Done</button>
    </form>
    
</div>


<?php require 'partials/footer.php'; ?>