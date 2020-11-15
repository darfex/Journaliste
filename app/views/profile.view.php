<?php require 'partials/adminheader.php'; ?>
    <?php if (isset($message)) : ?>
        <?= $message; ?>
    <?php endif; ?>
<div class="container-fluid">
    <h2>Update your profile</h2>
    <hr>
    
    <form action="update-profile?id=<?= $_SESSION['id']; ?>" method="POST">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?= $_SESSION['username']; ?>" required>
        
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstname" value="<?= $_SESSION['firstname']; ?>" required>
        
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname" value="<?= $_SESSION['lastname']; ?>" required>
        
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="<?= $_SESSION['email']; ?>" required>
        
        <label for="currentPassword">Current Password</label> <small>(Changing password is optional)</small>
        <input type="password" class="form-control" name="currentPassword" placeholder="Enter Current Password">

        <label for="password">New Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter New Password">

        <label for="cpassword">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" placeholder="Enter New Password">

        <button class="btn btn-success">Update</button>
    </form>
</div>

<?php require 'partials/footer.php'; ?>