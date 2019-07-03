<?php
session_start();

?>
<!DOCTYPE html>
<html lang="EN-GB">
<head>
    <title>LauDrift</title>
    <link rel="icon" href="img/e1.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrap.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.7/dist/css/main.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.7/dist/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.7/dist/js/npm.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.7/dist/js/jquery-3.3.1.min.js"></script>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#id">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="img/e1.png" class="img-responsive navbar-brand" alt="LauDrift">
            <a href="index.php" class="navbar-brand">LauDrift</a>
        </div>
        <div class="navbar-collapse collapse" id="id">
            <ul class="nav navbar-nav navbar-right">
                <?php
                    $message = 'logout';
                    if (!isset($_SESSION['username'])) {
                        # code...
                        echo '
                        <li><a href="login.php ">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
                <li><a href="reg.php ">Sign Up <span class="glyphicon glyphicon-registration-mark"></span></a></li>
                        ';
                    }
                    else {
                        echo '
                        <li class="active"><a href="index.php" class="navbar-link">LauDrift</a></li>
                        <li><a href="profile.php ">'.$_SESSION['username']. ' <span class="glyphicon glyphicon-user"></span></a></li>
                        <li><a href="logout.php ">'.$message. ' <span class="glyphicon glyphicon-log-out"></span></a></li>
                        ';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

</div>
<div class="container-fluid">
    <?php 
    if (!isset($_SESSION['username'])) {
        // login and sign up
        echo '
       ';
        }else {
            // Main Page
            echo '
        ';
    }
    
    ?>
</body>
</html>