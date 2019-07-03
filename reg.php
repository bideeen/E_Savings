<?php
/**
 * Created by PhpStorm.
 * User: clone
 * Date: 8/31/18
 * Time: 4:17 AM
 */
session_start();    

if (isset($_SESSION['username'])) {
    # code...
    header("location: index.php");
}
else {
    include('db/connect.php');

    if (isset($_REQUEST['uname'])) {
        # Remove Back Slahes
        $fname = stripslashes($_REQUEST['uname']);
        $uname = stripslashes($_REQUEST['uname']);
        $email = stripslashes($_REQUEST['email']);
        $pwd = stripslashes($_REQUEST['pwd']);
        // escapes special characters in string
        $fname = mysqli_real_escape_string($conn, $fname);
        $uname = mysqli_real_escape_string($conn, $uname);
        $email = mysqli_real_escape_string($conn, $email);
        $pwd = mysqli_real_escape_string($conn, $pwd);

        $query = "INSERT into `users` (fname, uname, pwd, email)VALUES ('$fname', '$uname', '".md5($pwd)."', '$email')";
        
        $result = mysqli_query($conn, $query);
        $query3 = "INSERT into `log` (uname,log_count)VALUES ('$uname', 0)";
        $result3 = mysqli_query($conn,$query3) or die(mysqli_error($conn));

        if (!$result) {
            # code...
            header("location: reg.php");
            exit();
        }else {
            # code...
            header("location: login.php");
            exit();
        }
        
    }
}


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
    <script type="text/javascript" language="JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="bootstrap-3.3.7/dist/js/npm.js"></script>
    <script type="text/javascript" language="JavaScript" src="bootstrap-3.3.7/dist/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" language="JavaScript">
        function submitreg() {
            var form = document.reg;
            if(form.name.value == ""){
                alert( "Enter name." );
                return false;
            }
            else if(form.uname.value == ""){
                alert( "Enter username." );
                return false;
            }
            else if(form.email.value == ""){
                alert( "Enter password." );
                return false;
            }
            else if(form.pwd.value == ""){
                alert( "Enter email." );
                return false;
            }
        }
    </script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="img/e1.png" class="img-responsive navbar-brand" alt="LauDrift">
            <a href="index.php" class="navbar-brand">LauDrift</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php" class="navbar-link">LauDrift</a></li>
            <li><a href="login.php " class="navbar-link">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
            <li class="active"><a href="reg.php " class="navbar-link">Sign Up <span class="glyphicon glyphicon-registration-mark"></span></a></li>
        </ul>
    </div>
</nav>

<div class="reg">
    <div class="jumbotron">
        <h2 class="h2" style="margin: 2%;">Registration</h2>
        <hr>
        <form action="" class="form-horizontal" name="reg" role="form">
            <div class="form-group">
                <label class="control-label col-sm-4" for="name">Fullname:</label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Fullname" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="uname">Username:</label>
                <div class="col-sm-4">
                    <input type="text" name="uname" class="form-control" id="uname" placeholder="Enter username" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Email:</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="pwd">Password:</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="poli"><input type="checkbox" required> <a href="policy.php" id="poli">I Accept The Policy</a></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" onclick="return(submitreg())" class="btn btn-success">Submit</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label for="link"><a href="reg.php" class="btn btn-success btn-block btn-lg" id="link">ALready A user, Click Me</a></label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>



