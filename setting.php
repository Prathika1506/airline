<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <script src="jquery-3.4.1.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script src="login.js"></script>
</head>
<body>
    <div id="header">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
            <div class="container">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="#" class="navbar-brand"><img src="download.png" style="width: 100px;height: 40px;"></a>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav ml-auto" id="new">
                        <li class="nav-item"><a href="hom.php" class="nav-link">HOME</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">CONTACT US</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#"><span class="glyphicon glyphicon-user"> Sign in&nbsp;</span><span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="signin.php" id="sign">Manager Signin</a>
                                <a class="dropdown-item" href="#">Customer Signin</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="registering.php" class="nav-link" id="reg">REGISTER</a></li>
                    </ul>


                    <ul class="navbar-nav ml-auto" id="old">
                        <li class="nav-item"><a href="hom.php" class="nav-link">HOME</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">CONTACT US</a></li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" tabindex="-1" href="#"><span class="glyphicon glyphicon-user" id="welcome"> Welcome!</span>
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="showhistory.php">History</a>
                                <a class="dropdown-item" href="setting.php">Setting</a>
                                <a class="dropdown-item" href="#" id="logout">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="sear">Setting</h5>
            <form name="myForm" class="form-signin" onsubmit="return validateForm()" action="save.php" method="post">
                <?php 
                    if(@$_GET['error']==true){
                ?>
                <div class="alert-light text-danger text-center py-3" id="errorm"><?php echo $_GET['error'] ?>
                </div>
                <?php

                    }
                 ?>
              <div class="form-group">
                <input type="text" name="user" class="form-control" placeholder="User Name*" required autofocus oninput="document.getElementById('errorm').innerHTML='';style=''">
              </div>

              <div class="form-group">
                <input type="password" name="oldpass" class="form-control" placeholder="Old Password*" required>
              </div>
              <div class="form-group">
                <input type="password" name="newpass" class="form-control" placeholder="New Password*" required oninput="document.getElementById('errnewpass').innerHTML='';style=''">
                  <label class="label" id="errnewpass"></label>
              </div>
              <div class="form-group">
                <input type="password" name="confpass" class="form-control" placeholder="Confirm Password*" required oninput="document.getElementById('errconfpass').innerHTML='';style=''">
                  <label class="label" id="errconfpass"></label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login_user" type="submit">SAVE</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="valid.js"></script>
</body>
</html>