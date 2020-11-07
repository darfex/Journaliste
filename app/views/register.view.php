<?php  require 'partials/header.php'; ?>
<link rel="stylesheet" href="../public/css/login.css">

    <div class="content">
        <?php if (isset($message)) : ?>
            <small style="color:red"><?= $message; ?></small>
        <?php endif; ?>
        <form action="add-user" method="POST">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" required>
            
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" name="firstname" required>
            
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" name="lastname" required>
            
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>

            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" required>

            <button class="btn">Register</button>
        </form>
    </div>
    
<?php require 'partials/footer.php'; ?>