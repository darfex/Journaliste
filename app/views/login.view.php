<?php  require 'partials/header.php'; ?>
<link rel="stylesheet" href="../public/css/auth.css">

    <div class="content">
        <?php if (isset($message)) : ?>
            <small style="color:red"><?= $message; ?></small>
        <?php endif; ?>
        <form action="auth" method="POST">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>

            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>

            <button class="btn submit">Login</button>
        </form>
    </div>
    
<?php require 'partials/footer.php'; ?>