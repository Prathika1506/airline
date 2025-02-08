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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                                <a class="dropdown-item" href="signin.php">Customer Signin</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="registering.php" class="nav-link" id="reg">REGISTER</a></li>
                    </ul>


                    <ul class="navbar-nav ml-auto" id="old">
                        <li class="nav-item"><a href="hom.php" class="nav-link">HOME</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">CONTACT US</a></li>
                        <li id = "cart">
                        <a class="nav-link" href="cartshow.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
                        </li>
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
    <div class="container" style="margin-top: 5%;padding: 6%;">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
        <form id="contact-form" name="myForm" method="post" action="hom.php" onsubmit="return validateForm()">

        <div class="messages"></div>

        <div class="controls">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_name">Firstname *</label>
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *"  oninput="document.getElementById('errname').innerHTML='';style=''">
                        <label class="label" id="errname"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_lastname">Lastname *</label>
                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" oninput="document.getElementById('errsurname').innerHTML='';style=''">
                        <label class="label" id="errsurname"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="form_email">Email *</label>
                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" oninput="document.getElementById('erremail').innerHTML='';style=''">
                        <label class="label" id="erremail"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="form_message">Message *</label>
                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" oninput="document.getElementById('errmessage').innerHTML='';style=''"></textarea>
                        <label class="label" id="errmessage"></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success btn-send" value="Send message">
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<footer class="page-footer font-small white pt-4">


  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="hom.php"> Ethiopian Airlines</a>
  </div>
  <!-- Copyright -->

</footer>
    <script src="validate.js"></script>
</body>
</html>

     