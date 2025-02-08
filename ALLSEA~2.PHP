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
    <meta http-equiv="X-UA-Compatible" content="ide=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <script src="jquery-3.4.1.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script src="login.js"></script>
    <script src="jump.js"></script>
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
<div class="container-fluid searchresult">    
  <div class="row">
    <div class="col-sm-12 text-left">
      <h1 class="sear">Search Results</h1>

<?php
include 'dbconnect.php';
// $con = mysqli_connect('localhost','root','vertrigo','airline');
$selectdate1 = $_POST["selectdate1"];
$selectdate2 = $_POST["selectdate2"]; 
global $sql, $availableNumber;

    $sql = "SELECT * FROM roundflights WHERE gdate = '$selectdate1' AND rdate = '$selectdate2'";


$result = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($result);

if($rowcount == 0){
    echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." result</div>";
}
else{
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
        $dairport = $row['airport1'];
        $gdate = $row['gdate'];
        $rdate = $row['rdate'];
        $aairport = $row['airport2'];
        $atime = $row['atime'];
        $dtime = $row['dtime'];

        $businessclass = "SELECT capacity,price,classname FROM class where fnumber = $fnumber AND classname = 'business'";
        $classes = mysqli_query($conn,$businessclass);
        while ($row = mysqli_fetch_array($classes)) {
                $bcapacity = $row['capacity'];
                $bprice = $row['price'];
                $businessclass = $row['classname'];
        }
        $economyclass = "SELECT capacity,price,classname FROM class where fnumber = $fnumber AND classname = 'economy'";
        $classe = mysqli_query($conn,$economyclass);
        while ($row = mysqli_fetch_array($classe)) {
                $ecapacity = $row['capacity'];
                $eprice = $row['price'];
                $economyclass = $row['classname'];
        }
        $pname = "SELECT * from airplane WHERE tdate = '$selectdate1' AND rdate = '$selectdate2'";
        $pnames = mysqli_query($conn, $pname);   
        while ($row = mysqli_fetch_array($pnames)) {
            $pname = $row['pname'];
            $bseat = $row['bseats'];
            $eseat = $row['eseats'];
        }
        echo "<td>".$fnumber."</td>";
        echo "<td>".$aid."</td>";
        echo "<td>".$pname."</td>";
        echo "<td>" . $gdate . "</td>";
        echo "<td>" . $rdate . "</td>";
        echo "<td>" . $dairport . "</td>";
        echo "<td>" . $dtime . "</td>";
        echo "<td>" . $aairport . "</td>";
        echo "<td>" . $atime . "</td>";
        echo "<td>" . $economyclass . "</td>";
        echo "<td>" . $ecapacity . "</td>";
        echo "<td>" . $eprice . "</td>";
        echo "<td>" . $eseat . "</td>";
       
            //calculate number of remain seats
        
        echo '<td>
            <form action="shoppingcart.php" method="post">
                <input type="hidden" name="flightno" value="'.$fnumber.'">
                <input type="hidden" name="classtype" value="'.$economyclass.'">
                <input type="hidden" name="gdate" value="'.$gdate.'">
                <input type="hidden" name="rdate" value="'.$rdate.'">
                <button type="submit" class="btn btn-primary" name="businessaddrbusiness">Add to Cart</button>
            </form>
            </td>';
    echo "</tr>";

echo "<tr>";
        echo "<td>".$fnumber."</td>";
        echo "<td>".$aid."</td>";
        echo "<td>".$pname."</td>";
        echo "<td>" . $gdate . "</td>";
        echo "<td>" . $rdate . "</td>";
        echo "<td>" . $dairport . "</td>";
        echo "<td>" . $dtime . "</td>";
        echo "<td>" . $aairport . "</td>";
        echo "<td>" . $atime . "</td>";
        echo "<td>" . $businessclass . "</td>";
        echo "<td>" . $bcapacity . "</td>";
        echo "<td>" . $bprice . "</td>";
        echo "<td>" . $bseat . "</td>";
       
            //calculate number of remain seats
        
        echo '<td>
            <form action="shoppingcart.php" method="post">
                <input type="hidden" name="flightno" value="'.$fnumber.'">
                <input type="hidden" name="classtype" value="'.$businessclass.'">
                <input type="hidden" name="gdate" value="'.$gdate.'">
                <input type="hidden" name="rdate" value="'.$rdate.'">
                <button type="submit" class="btn btn-primary" name="businessaddrbusiness">Add to Cart</button>
            </form>
            </td>';
    echo "</tr>";

}
        
echo " </tbody></table>";

}
mysqli_close($conn);
?>
 
    </div>
    
  </div>
</div>

</body>
</html>