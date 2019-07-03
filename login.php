<?php

require('db/connect.php');

session_start();
if (isset($_SESSION['username'])){
    // Redirect
    header("location: index.php");
}else {
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
        $username = mysqli_real_escape_string($conn,$username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        //Checking is user existing in the database or not
        $query1 = "SELECT * FROM `users` WHERE uname='$username' and pwd='".md5($password)."'";
        $query2 = "SELECT * FROM `log` WHERE uname= '$username'";
        $result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
        $fetch = mysqli_query($conn,$query2) or die(mysqli_error($conn));
        if ($fetch == TRUE)
        {
            // Fetch one and one row
            while ($row=mysqli_fetch_row($fetch))
                {
                    $row['log_count'] = $row['log_count'] + 1;
                    $query3 = "UPDATE `log` SET uname= '$username',log_count = '".$row['log_count']."' WHERE uname = '$username'";
                    $result3 = mysqli_query($conn,$query3) or die(mysqli_error($conn));
                }
        }    
        $rows = mysqli_num_rows($result1);
            if($rows==1){
                $_SESSION['username'] = $username;
                // Redirect user to index.php
                header("Location: index.php");
            }
    }
}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="EN-GB">
<head>
    <title>LauDrift - Login</title>
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#id">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="img/e1.png" class="img-responsive navbar-brand" alt="LauDrift">
            <a href="index.php" class="navbar-brand">LauDrift</a>
        </div>
        <div class="navbar-collapse collapse" id="id">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php" class="navbar-link">LauDrift</a></li>
                <li class="active"><a href="login.php ">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
                <li><a href="reg.php ">Sign Up <span class="glyphicon glyphicon-registration-mark"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="form">
    <h1>Log In</h1>
    <form action="" method="post" name="login" class="form-horizontal">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <input name="submit" type="submit" value="Login" />
    </form>
    <p>Not registered yet? <a href='reg.php'>Register Here</a></p>
    </div>
</body>
</html>