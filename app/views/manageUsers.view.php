<?php require 'partials/adminheader.php'; ?>
<link rel="stylesheet" href="../public/css/adminpost.css">

<div class="container-fluid">
    <?php if ($_SESSION['role'] === 'superadmin') : ?>
        <div class="table-responsive-md">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <th class="header"></th>
                    <th class="header">Username</th>
                    <th class="header">Firstname</th>
                    <th class="header">Lastname</th>
                    <th class="header">Email</th>
                    <th class="header">Role</th>
                    <th class="header">Change Role</th>
                    <th class="header">Delete</th>
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
                            <td><?= ucfirst($user->user_role); ?></td>
                            <td class="role">
                                <?php if ($user->user_role !== 'superadmin' && $user->user_role !== 'admin') : ?>
                                    <button class="status" onclick="window.location.href='UserRole?role=admin&id=<?= $user->id; ?>'">Make Admin</button>
                                <?php elseif($user->user_role === 'admin') : ?>
                                    <button class="status" onclick="window.location.href='UserRole?role=user&id=<?= $user->id; ?>'">Remove Admin</button>
                                <?php endif; ?>
                            </td>
                            <td class="delete">
                                <?php if($user->user_role !== 'superadmin') : ?>
                                    <button class="btns" onclick="window.location.href='deleteUser?id=<?= $user->id; ?>'"><i class="fas fa-times"></i></button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <th class="header"></th>
                <th class="header">Username</th>
                <th class="header">Firstname</th>
                <th class="header">Lastname</th>
                <th class="header">Email</th>
                <th class="header">Role</th>
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
                        <td><?= ucfirst($user->user_role); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</div>

<?php require 'partials/footer.php'; ?>