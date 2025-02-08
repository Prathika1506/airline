<?php
// Start the session
session_start();


?>
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
<div class="jumbotron container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-1"></div>
    <div class="col-sm-10 text-left"> 
      <h1>Shopping cart</h1>

<?php

include_once 'dbconnect.php';
 
if(!isset($_SESSION['username'])){
    header("Location: signin.php");
}else{
    $username = $_SESSION['username'];	
$oneway = "One Way";
$round = "Round Trip";

$sql = "SELECT FL.fnumber AS FLnumber, pname, B.ID AS bookid, time, B.date,  dairport, dtime, aairport, atime, C.classname AS classtype, capacity, price
            FROM onewayflights FL,  class C, airplane AP , books B
            WHERE (FL.fnumber = C.fnumber) AND (B.fnumber = C.fnumber) AND (classtype = C.classname) AND (FL.aid = AP.aid) AND  B.username = '$username' AND paid = '1'
            ORDER BY time";

$result = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($result);

    if($rowcount == 0){
        echo "<div class='alert alert-info'><strong>No One-Way Trips.</strong></div>";
    }
    else{
    echo "<div class='alert alert-info'><strong>One Way Shopping Cart:</strong></div>";



    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Flight Type</th>
            <th>Time</th>
            <th>Flight</th>
            <th>Aircraft</th>
            <th>Date</th>
            <th>Departure</th>
            <th>Departure Time</th>
            <th>Arrival</th>
            <th>Arrival Time</th>
            <th>Class</th>

            <th>Price</th>

            <th>Delete</th>
          </tr>
          </thead>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tbody><tr>";
        echo "<td>" . $oneway . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['FLnumber'] . "</td>";
        echo "<td>" . $row['pname']."</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['dairport'] . "</td>";
        echo "<td>" . $row['dtime'] . "</td>";
        echo "<td>" . $row['aairport'] . "</td>";
        echo "<td>" . $row['atime'] . "</td>";
        echo "<td>" . $row['classtype'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo '<td>
            <form action="cartdelete.php" method="post">
            <input type="hidden" name="bookid" value="'.$row['bookid'].'" >
            <button type="submit" class="btn btn-danger">Delete Forever</button></div>
            </form>        
            </td>';
        
		$sum = mysqli_query($conn,"SELECT SUM(price)
							            FROM books B, class C
							            WHERE B.username = '$username' AND paid = '1' AND flightype = '$oneway'
							            AND classtype=C.classname AND B.fnumber = C.fnumber");

		$t = mysqli_fetch_array($sum);
		$total = $t['SUM(price)'];



        echo "</tr>";
    }
    echo " </tbody></table>";
    echo '<form action="clearhistory.php" method="post">
                <div class="row">
                <div class="col-sm-4"></div>
                <label class="lead">'.'Total: '.$total.'</label>
                <div class="col-sm-4"></div>
                <input type="hidden" name="round" value="'.$oneway.'">
                <button type="submit" class="btn btn-primary">Clear</button>
                </div>
            </form>';
    echo "<br>";

    }


$sql = "SELECT FL.fnumber AS fnumber, pname, B.ID AS bookid, time, B.date,B.rdate, airport1, dtime, airport2, atime, C.classname AS classtype, capacity, price
            FROM roundflights FL,  class C, airplane AP , books B
            WHERE (FL.fnumber = C.fnumber) AND (B.fnumber = C.fnumber) AND (classtype = C.classname) AND (FL.aid = AP.aid) AND  B.username = '$username' AND paid = '1'
            ORDER BY time";

$result = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($result);

    if($rowcount == 0){
        echo "<div class='alert alert-info'><strong>No Round Trips.</strong></div>";
    }
    else{
    echo "<div class='alert alert-info'><strong>Round Trip Shopping Cart:</strong></div>";



    echo "<table class='table table-bordered table-striped table-hover'>
          <thead>
          <tr>
            <th>Flight Type</th>
            <th>Time</th>
            <th>Flight</th>
            <th>Aircraft</th>
            <th>Going Date</th>
            <th>Returning Date</th>
            <th>Departure</th>
            <th>Departure Time</th>
            <th>Arrival</th>
            <th>Arrival Time</th>
            <th>Class</th>

            <th>Price</th>

            <th>Delete</th>
          </tr>
          </thead>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tbody><tr>";
        echo "<td>" . $round . "</td>";
        echo "<td>" . $row['time'] . "</td>";
        echo "<td>" . $row['fnumber'] . "</td>";
        echo "<td>" . $row['pname']."</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['rdate'] . "</td>";
        echo "<td>" . $row['airport1'] . "</td>";
        echo "<td>" . $row['dtime'] . "</td>";
        echo "<td>" . $row['airport2'] . "</td>";
        echo "<td>" . $row['atime'] . "</td>";
        echo "<td>" . $row['classtype'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        
        if($row['classtype'] == 'business'){

        }elseif ($row['classtype'] == 'economy') {
            
        }
        echo '<td>
            <form action="cartdelete.php" method="post">
            <input type="hidden" name="bookid" value="'.$row['bookid'].'" >
            <button type="submit" class="btn btn-danger">Delete Forever</button></div>
            </form>        
            </td>';
        
        $sum = mysqli_query($conn,"SELECT SUM(price)
                                        FROM books B, class C
                                        WHERE B.username = '$username' AND paid = '1' AND flightype = '$round'
                                        AND classtype=C.classname AND B.fnumber = C.fnumber");

        $t = mysqli_fetch_array($sum);
        $total = $t['SUM(price)'];



        echo "</tr>";
    }
    echo " </tbody></table>";
    echo '<form action="clearhistory.php" method="post">
                <div class="row">
                <div class="col-sm-4"></div>
                <label class="lead">'.'Total: '.$total.'</label>
                <div class="col-sm-4"></div>
                <input type="hidden" name="round" value="'.$round.'">
                <button type="submit" class="btn btn-primary">Clear</button>
                </div>
            </form>';
    echo "<br>";

    }
}

mysqli_close($conn);


?>
 
    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
        <a href="#" title="To Top">
            <span class="glyphicon glyphicon-chevron-up">^</span>
        </a>
        <p>Ethiopian Airlines</p>     
</footer>


</body>
</html>