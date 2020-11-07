<?php require 'partials/adminheader.php'; ?>


<div class="container-fluid">
    <h2>Add new Post</h2>
    <hr>

    <form action="" method="POST">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="text" placeholder="Enter Title" required>

        <label for="image">Add Image</label> <small>(Not more than 5mb)</small>
        <br>
        <input type="file" name="image">
        <br>

        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="text" placeholder="Enter some tags separated by comma (,)">

        <label for="content">Post Content</label>
        <textarea class="form-control" name="content"  id="" rows="11"></textarea>
        <button class="btn btn-success">Publish</button>
        <button class="btn btn-warning">Save as Draft</button>
        
    </form>
    
</div>


<?php require 'partials/footer.php'; ?>