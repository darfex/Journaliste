<?php require 'partials/adminheader.php'; ?>

    <div class="container-fluid">
        <h2>Add new User</h2>

        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" required>
            
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" name="firstname" required>
            
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" name="lastname" required>
            
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" required>

            <select name="role" id="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <!-- <br> -->
            
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>

            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" required>

            <button class="btn btn-success">Add User</button>
        </form>
    </div>


<?php require 'partials/footer.php'; ?>