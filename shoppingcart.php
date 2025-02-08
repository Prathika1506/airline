<?php
// Start the session
session_start();

include_once 'dbconnect.php';
date_default_timezone_set("America/Chicago");
$t=time();
$time = date("Y-m-d h:i:s");


if(!isset($_SESSION['username'])){
    header("Location: signin.php");
}
	elseif(isset($_POST['economyadd'])){
		$flightno = $_POST["flightno"];
		$class = $_POST["classtype"];
		$date = $_POST["date"];
	    $username = $_SESSION['username'];
		$sql = "INSERT INTO books (flightype,time, date,rdate, fnumber, username, classtype, paid) 
				VALUES ('One Way','$time', '$date','0', '$flightno', '$username', '$class', '0')";;

		$result = mysqli_query($conn,$sql);
	    header("Location: cartshow.php");
	}
	elseif(isset($_POST['businessaddrbusiness'])){
		$flightno = $_POST["flightno"];
		$class = $_POST["classtype"];
		$gdate = $_POST["gdate"];
		$rdate = $_POST["rdate"];
	    $username = $_SESSION['username'];
	// if($type == "onewayflights" ){
		$sql = "INSERT INTO books (flightype,time, date,rdate, fnumber, username, classtype, paid) 
				VALUES ('Round Trip','$time', '$gdate','$rdate', $flightno, '$username', '$class', '0')";;


		$result = mysqli_query($conn,$sql);
		// echo "inserted";
	    header("Location: cartshow.php");
		// }
	}
	// elseif(isset($_POST['businessaddreconomy'])){
	// 	$flightno = $_POST["flightno"];
	// 	$class = $_POST["classtype"];
	// 	$gdate = $_POST["gdate"];
	// 	$rdate = $_POST["gdate"];
	//     $username = $_SESSION['username'];
	// 	$sql = "INSERT INTO books (flightype,time, date,rdate, fnumber, username, classtype, paid) 
	// 			VALUES ('Round Trip','$time', '$gdate','$rdate', '$flightno', '$username', '$class', '0')";;

	// 	$result = mysqli_query($conn,$sql);
	//     header("Location: cartshow.php");
	// }	
	else
	// if($type =="roundtrip"){

	// $flightno = $_POST["flightno"];
	// $class = $_POST["classtype"];
	// $price = $_POST["price"];
	// $date = $_POST["date"];


	// $flightno2 = $_POST["flightno2"];
	// $class2 = $_POST["classtype2"];
	// $price2 = $_POST["price2"];

	// $returndate = $_POST["date2"];

	// $sql = "INSERT INTO books (time, date, flightno, username, classtype, paid) 
	// 		VALUES ('$time', '$date', '$flightno', '$username', '$class', '0')";;

	// $result = mysqli_query($conn,$sql);

 //    // header("Location: cartshow.php");
	// }


    echo "Error adding to cart..";



mysqli_close($conn);


?>



