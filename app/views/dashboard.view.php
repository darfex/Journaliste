<?php 

require 'partials/adminheader.php';

if (isset($message)){
    echo $message;
}

$published = 0;
$draft = 0;
$admin = 0;
$non_admin = 0;

foreach ($posts as $post)
{   
    $post->stat === 'published' ? $published += 1 : $draft += 1;
}

foreach ($users as $user)
{
    $user->user_role === 'admin' || $user->user_role === 'superadmin' ? $admin += 1 : $non_admin += 1;
}

?>

<div class="container-fluid">
    <h2 class="page-header">Hello <?= ucfirst($_SESSION['username']); ?></h2>

    <div class="alert alert-success">
        <b><i class="fas fa-bullhorn"></i>&nbsp&nbspWelcome to your Admin Dashboard!</b>   
        <span class="close">x</spna> 
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-1">
            <i class="fas fa-file fa-5x"></i>
            <p class="text stat"><?= $published + $draft; ?></p>
            <br>
            <strong class="text name">Posts</strong>
        </div>
        
        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-2">
            <i class="fas fa-check fa-5x"></i>
            <p class="text stat"><?= $published; ?></p>
            <br>
            <strong class="text name">Published</strong>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-3">
            <i class="fas fa-tasks fa-5x"></i>
            <p class="text stat"><?= $draft; ?></p>
            <br>
            <strong class="text name">Drafts</strong>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-4">
            <i class="fas fa-users fa-5x"></i>
            <p class="text stat"><?= $admin + $non_admin; ?></p>
            <br>
            <strong class="text name">All Users</strong>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-5">
            <i class="fa fa-user-lock fa-5x"></i>
            <p class="text stat"><?= $admin; ?></p>
            <br>
            <strong class="text name">Admin</strong>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-6">
            <i class="fas fa-user fa-5x"></i>
            <p class="text stat"><?= $non_admin; ?></p>
            <br>
            <strong class="text name">User</strong>
        </div>

    </div>

</div>


<? require 'partials/footer.php'; ?>