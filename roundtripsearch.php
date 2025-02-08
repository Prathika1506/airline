<?php 
 include '../Model/Database.php';  
 $data = new Database;  
 $success_message = '';  

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
                        <li class="nav-item"><a href="#" class="nav-link">HOME</a></li>
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
<div class="container-fluid searchresult">    
  <div class="row">
    <div class="col-sm-12 text-left">
      <h1 class="sear">Search Results</h1>
<?php
include 'dbconnect.php';
// $con = mysqli_connect('localhost','root','vertrigo','airline');
$dairport = $_POST["from"];
$aairport = $_POST["to"];
$departime = $_POST["dtime"];
$arivaltime = $_POST["return"];
$class = $_POST["classtype"];

if($class == "Business"){
    global $sql, $availableNumber;
        $sql = "SELECT FL.fnumber,FL.aid,FL.airport1,FL.gdate,FL.airport2,FL.rdate,FL.atime,FL.dtime,C.classname,C.capacity,C.price,AR.pname,AR.bseats FROM airplane AR, roundflights FL,class C WHERE FL.gdate = '$departime' AND FL.rdate = '$arivaltime' AND FL.airport1 = '$dairport' AND FL.airport2 = '$aairport' AND C.classname = 'business' AND (C.fnumber = FL.fnumber) AND (AR.aid = FL.aid) AND (AR.pnumber = FL.fnumber)";
    $result = mysqli_query($conn,$sql);
    $rowcount = mysqli_num_rows($result);

if($rowcount == 0){
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." result</div>";
}
else{
    $rowcount = 2 * $rowcount;
echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." results</div>";

echo "<table class='table table-bordered table-striped table-hover'>
      <thead>
      <tr>
        <th>Flight</th>
        <th>Airplane Id</th>
        <th>Airplane Name</th>
        <th>Going Date</th>
        <th>Returning Date</th>
        <th>Airport 1</th>
        <th>Departure Time</th>
        <th>Airport 2</th>
        <th>Arrival Time</th>
        <th>Class</th>
        <th>Capacity</th>
        <th>Price</th>
        <th>Remain Seats</th>
        <th>Reserve</th>
      </tr>
      </thead>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tbody><tr>";
        
        $fnumber = $row['fnumber'];
        $aid = $row['aid'];
        $pname = $row['pname'];
        $gdate = $row['gdate'];
        $rdate = $row['rdate'];
        $dairport = $row['airport1'];
        $dtime = $row['dtime'];
        $aairport = $row['airport2'];
        $atime = $row['atime'];
        $classname = $row['classname'];
        $capacity = $row['capacity'];
        $price = $row['price'];
        $bseats = $row['bseats'];

        echo "<td>".$fnumber."</td>";
        echo "<td>".$aid."</td>";
        echo "<td>".$pname."</td>";
        echo "<td>" . $gdate . "</td>";
        echo "<td>" . $rdate . "</td>";
        echo "<td>" . $dairport . "</td>";
        echo "<td>" . $dtime . "</td>";
        echo "<td>" . $aairport . "</td>";
        echo "<td>" . $atime . "</td>";
        echo "<td>" . $classname . "</td>";
        echo "<td>" . $capacity . "</td>";
        echo "<td>" . $price . "</td>";
        echo "<td>" . $bseats . "</td>";
    //     if($bseat>0){
        echo '<td>
            <form action="shoppingcart.php" method="post">
                <input type="hidden" name="flightno" value="'.$fnumber.'">
                <input type="hidden" name="price" value="'.$price.'">
                <input type="hidden" name="classtype" value="'.$classname.'">
                <input type="hidden" name="date" value="'.$departime.'">
                <input type="hidden" name="arivaltime" value="'.$arivaltime.'">
                <input type="hidden" name="type" value="onewayflights">
                <button type="submit" class="btn btn-primary" name="businessaddrbusiness">Add to Cart</button>
            </form>
            </td>';
        // }
        // else{
        //     echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
        // }
        echo "</tr>";
    }
echo " </tbody></table>";

}
}elseif($class == "Economy"){global $sql, $availableNumber;
        $sql = "SELECT FL.fnumber,FL.aid,FL.airport1,FL.gdate,FL.airport2,FL.rdate,FL.atime,FL.dtime,C.classname,C.capacity,C.price,AR.pname,AR.eseats FROM airplane AR, roundflights FL,class C WHERE FL.gdate = '$departime' AND FL.rdate = '$arivaltime' AND FL.airport1 = '$dairport' AND FL.airport2 = '$aairport' AND C.classname = 'economy' AND (C.fnumber = FL.fnumber) AND (AR.aid = FL.aid) AND (AR.pnumber = FL.fnumber)";
    $result = mysqli_query($conn,$sql);
    $rowcount = mysqli_num_rows($result);

if($rowcount == 0){
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." result</div>";
}
else{
    $rowcount = 2 * $rowcount;
echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." results</div>";

echo "<table class='table table-bordered table-striped table-hover'>
      <thead>
      <tr>
        <th>Flight</th>
        <th>Airplane Id</th>
        <th>Airplane Name</th>
        <th>Going Date</th>
        <th>Returning Date</th>
        <th>Airport 1</th>
        <th>Departure Time</th>
        <th>Airport 2</th>
        <th>Arrival Time</th>
        <th>Class</th>
        <th>Capacity</th>
        <th>Price</th>
        <th>Remain Seats</th>
        <th>Reserve</th>
      </tr>
      </thead>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tbody><tr>";
        
        $fnumber = $row['fnumber'];
        $aid = $row['aid'];
        $pname = $row['pname'];
        $gdate = $row['gdate'];
        $rdate = $row['rdate'];
        $dairport = $row['airport1'];
        $dtime = $row['dtime'];
        $aairport = $row['airport2'];
        $atime = $row['atime'];
        $classname = $row['classname'];
        $capacity = $row['capacity'];
        $price = $row['price'];
        $bseats = $row['eseats'];

        echo "<td>".$fnumber."</td>";
        echo "<td>".$aid."</td>";
        echo "<td>".$pname."</td>";
        echo "<td>" . $gdate . "</td>";
        echo "<td>" . $rdate . "</td>";
        echo "<td>" . $dairport . "</td>";
        echo "<td>" . $dtime . "</td>";
        echo "<td>" . $aairport . "</td>";
        echo "<td>" . $atime . "</td>";
        echo "<td>" . $classname . "</td>";
        echo "<td>" . $capacity . "</td>";
        echo "<td>" . $price . "</td>";
        echo "<td>" . $bseats . "</td>";
    //     if($bseat>0){
        echo '<td>
            <form action="shoppingcart.php" method="post">
                <input type="hidden" name="flightno" value="'.$fnumber.'">
                <input type="hidden" name="price" value="'.$price.'">
                <input type="hidden" name="classtype" value="'.$classname.'">
                <input type="hidden" name="date" value="'.$departime.'">
                <input type="hidden" name="arivaltime" value="'.$arivaltime.'">
                <input type="hidden" name="type" value="onewayflights">
                <button type="submit" class="btn btn-primary" name="businessaddrbusiness">Add to Cart</button>
            </form>
            </td>';
        // }
        // else{
        //     echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
        // }
        echo "</tr>";
    }
echo " </tbody></table>";

}
}
mysqli_close($conn);
?>
    </div>
  </div>
</div>
</body>
</html>