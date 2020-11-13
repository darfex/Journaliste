<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Journaliste</div>
        <div class="list-group list-group-flush">
            <a href="dashboard" class="list-group-item list-group-item-action bg-dark"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="" class="list-group-item list-group-item-action bg-dark dropdown-toggle" data-toggle="collapse" data-target="#posts"><i class="fas fa-file"></i>&nbsp Posts</a>
                <ul id="posts" class="collapse">
                    <li class="nav-item">
                        <a href="posts">View Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="addPost">Add New Post</a>
                    </li>
                </ul>
            <a href="#" class="list-group-item list-group-item-action bg-dark dropdown-toggle" data-toggle="collapse" data-target="#users"><i class="fas fa-users"></i> Users</a>
                <ul id="users" class="collapse">
                    <li class="nav-item">
                        <a href="users">View Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="addUser">Add New User</a>
                    </li>
                </ul>
            <a href="profile" class="list-group-item list-group-item-action bg-dark"><i class="fas fa-user"></i>&nbsp User Account</a>
        </div>
    </div>
<div id="page-content-wrapper">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <span class="navbar-toggler-icon" id="menu-toggle"></span>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= ucfirst($_SESSION['username']); ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="logout">Log out</a>
                    <!-- <div class="dropdown-divider"></div> -->
                </div>
            </li>
        </ul>
    </div>
</nav>