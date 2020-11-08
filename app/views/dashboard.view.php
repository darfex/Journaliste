<?php 
session_start();
require 'partials/adminheader.php'; 
?>

<div class="container-fluid">
    <h1 class="page-header">Hello <?= ucfirst($_SESSION['username']); ?></h1>

    <div class="alert alert-success">
        <b><i class="fas fa-bullhorn"></i>&nbsp&nbspWelcome to your Admin Dashboard!</b>   
        <span class="close">x</spna> 
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-1">
            <i class="fas fa-file fa-5x"></i>
            <p class="text stat">5</p>
            <br>
            <strong class="text name">Posts</strong>
        </div>
        
        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-2">
            <i class="fas fa-check fa-5x"></i>
            <p class="text stat">4</p>
            <br>
            <strong class="text name">Published</strong>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-3">
            <i class="fas fa-tasks fa-5x"></i>
            <p class="text stat">1</p>
            <br>
            <strong class="text name">Drafts</strong>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-4">
            <i class="fas fa-users fa-5x"></i>
            <p class="text stat">15</p>
            <br>
            <strong class="text name">Users</strong>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-5">
            <i class="fa fa-user-lock fa-5x"></i>
            <p class="text stat">4</p>
            <br>
            <strong class="text name">Admin</strong>
        </div>

        <div class="col-lg-3 col-md-5 col-sm-5 panel panel-6">
            <i class="fas fa-user fa-5x"></i>
            <p class="text stat">11</p>
            <br>
            <strong class="text name">User</strong>
        </div>

    </div>

</div>


<? require 'partials/footer.php'; ?>