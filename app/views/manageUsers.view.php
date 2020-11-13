<?php require 'partials/adminheader.php'; ?>
<link rel="stylesheet" href="../public/css/adminpost.css">

<div class="container-fluid">
    <div>
        <table>
            <thead>
                <th></th>
                <th>Username</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Change Role</th>
                <th>Delete User</th>
            </thead>
            <tbody>
                <?php $num = 0; ?>
                <?php foreach($data as $user) : ?>
                    <tr>
                        <td><?= $num += 1; ?></td>
                        <td><?= ucfirst($user->username); ?></td>
                        <td><?= ucfirst($user->firstname); ?></td>
                        <td><?= ucfirst($user->lastname); ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= ucfirst($user->role); ?></td>
                        <td>Make Admin</td>
                        <td>Delete</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'partials/footer.php'; ?>