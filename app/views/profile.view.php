<?php 
session_start();
require 'partials/adminheader.php'; 
?>

<div class="container-fluid">
    <h2>Update your profile</h2>
    <hr>
    
    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" required>
        
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstname" required>
        
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname" required>
        
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" required>
        
        <label for="pass">Current Password</label> <small>(Changing password is optional)</small>
        <input type="password" class="form-control" name="pass" placeholder="Enter Current Password" required>

        <label for="newpass">New Password</label>
        <input type="password" class="form-control" name="newpass" placeholder="Enter New Password" required>

        <button class="btn btn-success">Update</button>
    </form>
</div>

<?php require 'partials/footer.php'; ?>