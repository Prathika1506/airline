<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
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
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
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
                        <li class="nav-item"><a href="#" class="nav-link">HOME</a></li>
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
                        <!-- <li class="nav-item"><a href="contact.php" class="nav-link" id="welcome"></a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid register" id="regi">
                <div class="row">
                    <div class="col-md-2 register-left">
                    </div>
                    <div class="col-md-8 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Welcome</h3>
                                <form name="myForm" method="post" action="registering.php" onsubmit="return validateRegisterForm()">
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="fname" class="form-control" placeholder="First Name *" oninput="document.getElementById('errfname').innerHTML='';style=''">
                                                <label class="label" id="errfname"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="lname" class="form-control" placeholder="Last Name *" oninput="document.getElementById('errlname').innerHTML='';style=''">
                                                <label class="label" id="errlname"></label>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control" placeholder="User Name *" oninput="document.getElementById('errusername').innerHTML='';style=''">
                                                <label class="label" id="errusername"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Password *" oninput="document.getElementById('errpass').innerHTML='';style=''">
                                                <label class="label" id="errpass"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="confpass" class="form-control"  placeholder="Confirm Password *" oninput="document.getElementById('errconfpass').innerHTML='';style=''">
                                                <label class="label" id="errconfpass"></label>
                                            </div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="sex" value="male" checked>
                                                        <span> Male </span> 
                                                    </label>
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="sex" value="female">
                                                        <span>Female </span> 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <input type="number" name="age" min="18" max="60" placeholder="Age *" value="" class="form-control" oninput="document.getElementById('errage').innerHTML='';style=''">
                                                <label class="label" id="errage"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email Address *" oninput="document.getElementById('erremail').innerHTML='';style=''">
                                                <label class="label" id="erremail"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" minlength="10" maxlength="10" name="phone" class="form-control" placeholder="Phone Number *" oninput="document.getElementById('errphone').innerHTML='';style=''">
                                                <label class="label" id="errphone"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="passport" class="form-control" placeholder="Passport Number *" oninput="document.getElementById('errpassport').innerHTML='';style=''">
                                                <label class="label" id="errpassport"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="homenum" class="form-control" placeholder="Home Number *" oninput="document.getElementById('errhomenum').innerHTML='';style=''">
                                                <label class="label" id="errhomenum"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="street" class="form-control" placeholder="Street Name *" oninput="document.getElementById('errstreet').innerHTML='';style=''">
                                                <label class="label" id="errstreet"></label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="city" class="form-control" placeholder="City *" oninput="document.getElementById('errcity').innerHTML='';style=''">
                                                <label class="label" id="errcity"></label>
                                            </div>
                                            <input type="submit" name="reg_user" class="btnRegister"  value="Register"/>
                                        </div>
                                        <div class="login">
                                                <p>already have an account</p>
                                                <a href="signin.php" >signin</a> 
                                            <!-- <h6 style="color: red;">already have an account</h6>            
                                            <input type="submit" class="btnsignin btn" name="signin" value="Sign In"/><br/> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 register-left">
                        <!-- <h3>Welcome</h3> -->
                    </div>
                </div>

            </div>
            <script src="validate.js"></script>

</body>
</html>