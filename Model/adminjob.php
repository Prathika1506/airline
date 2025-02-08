<?php
	if (isset($_POST['btn_addo'])) { 
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$flightno = $_POST['flightno'];
			$airplaneid = $_POST['airplaneid'];
			$ttime = $_POST['ttime'];
			$departure = $_POST['departure'];
			$dtime = $_POST['dtime'];
			$arrival = $_POST['arrival'];
			$atime = $_POST['atime'];
			$ec = $_POST['ecapacity'];
			$ep = $_POST['eprice'];
			$bc = $_POST['bcapacity'];
			$bp = $_POST['bprice'];
			$pname = $_POST['airplanename2'];
			$time = date("Y-m-d");

			if(empty($bp) || empty($bc) || empty($ep) || empty($ec) || empty($atime) || empty($arrival) || empty($dtime) || empty($departure) || empty($ttime) || empty($airplaneid)){
				header('location:../View/adminpage.php?errflightoneway=Fill all fields');
			}
			// include 'dbconnect.php';
			// $var = false;
			// $sql = "SELECT fnumber FROM onewayflights WHERE 1";
			// $result = mysqli_query($conn,$sql);
			// while($row = mysqli_fetch_array($result)){
			// 	if($row['fnumber'] == $flightno){
			// 		$var = true;
			// 		break;
			// 	}
			// }
			// if($var == true){
			// 	header('location:../View/adminpage.php?errflight=Flight Number already exists');
			// }
			if ($ttime > $time) {
				include('dbconnect.php');
				
				$sql = "INSERT INTO onewayflights VALUES( $flightno, $airplaneid, '$ttime' , '$departure', '$dtime', '$arrival', '$atime')";
				mysqli_query($conn,$sql) or die('Flight Number Already Exists');
				$sql2 = "INSERT INTO airplane VALUES($airplaneid,'$pname',$flightno,$ec,$bc,'$ttime','')";
				mysqli_query($conn,$sql2) or die('can not insert'); 

				$sql3 = "INSERT INTO class VALUES($flightno,$ec ,$ep,'Economy')";
				mysqli_query($conn,$sql3) or die('can not insert');
				
				$sql4 = "INSERT INTO class VALUES($flightno,$bc ,$bp,'Business')";
				mysqli_query($conn,$sql4) or die('can not insert');
				
				mysqli_close($conn);
				header('location:../View/adminpage.php');
			}elseif($ttime <= $time){
				header('location:../View/adminpage.php?err=Date is not valid');
			}
		}
	}
	if (isset($_POST['btn_addr'])) { 
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$flightno = $_POST['flightno'];
			$airplaneid = $_POST['airplaneid'];
			$gtime = $_POST['gtime'];
			$rtime = $_POST['rtime'];
			$airport1 = $_POST['airport1'];
			$airport2 = $_POST['airport2'];
			$dtime = $_POST['dtime'];
			$atime = $_POST['atime'];
			$ec = $_POST['ecapacity'];
			$ep = $_POST['eprice'];
			$bc = $_POST['bcapacity'];
			$bp = $_POST['bprice'];
			$pname = $_POST['airplanename2'];

			if(empty($bp) || empty($bc) || empty($ep) || empty($ec) || empty($atime) || empty($airport1) || empty($dtime) || empty($airport2) || empty($gtime) || empty($rtime) || empty($airplaneid)){
				header('location:../View/adminpage.php?errflight=Fill all fields');
			}

			include('dbconnect.php');
			$sql = "INSERT INTO roundflights VALUES( $flightno, $airplaneid, '$gtime', '$rtime', '$airport1', '$dtime', '$airport2', '$atime')";
			mysqli_query($conn,$sql) or die('can not insert roundflights');
			$sql2 = "INSERT INTO airplane VALUES($airplaneid,'$pname',$flightno,$ec,$bc,'$gtime','$rtime')";
			mysqli_query($conn,$sql2) or die('can not insert airplane'); 

			$sql3 = "INSERT INTO class VALUES($flightno,$ec ,$ep,'Economy')";
			mysqli_query($conn,$sql3) or die('can not insert classeconomy');
			
			$sql4 = "INSERT INTO class VALUES($flightno,$bc ,$bp,'Business')";
			mysqli_query($conn,$sql4) or die('can not insert business');
			
			mysqli_close($conn);
			header('location:../View/adminpage.php');
		}
	}
	if (isset($_POST['btn_update'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// $flightno1 = $_POST['number'];
			$flightno = $_POST['flightno'];
			$airplaneid = $_POST['airplaneid'];
			$ttime = $_POST['ttime'];
			$departure = $_POST['departure'];
			$dtime = $_POST['dtime'];
			$arrival = $_POST['arrival'];
			$atime = $_POST['atime'];
			$ec = $_POST['ecapacity'];
			$ep = $_POST['eprice'];
			$bc = $_POST['bcapacity'];
			$bp = $_POST['bprice'];
			$airplanename2 = $_POST['airplanename1'];

			if(empty($bp) || empty($bc) || empty($ep) || empty($ec) || empty($atime) || empty($arrival) || empty($dtime) || empty($departure) || empty($ttime) || empty($airplaneid)){
				header('location:../View/adminpage.php?errflight=Fill all fields');
			}

			// $conn = mysqli_connect('localhost', 'root', 'vertrigo', 'airline');
			include('dbconnect.php');
			$update = "UPDATE `onewayflights` SET fnumber = $flightno,aid = $airplaneid, todate = '$ttime', dairport = '$departure', dtime = '$dtime', aairport = '$arrival', atime = '$atime' WHERE fnumber = $flightno";
			mysqli_query($conn,$update) or die('can not update flight');


			$update1 = "UPDATE `class` SET capacity = $bc, price = $bp WHERE fnumber = $flightno AND classname = 'Business'";
			mysqli_query($conn,$update1) or die('can not update class1');
			$update3 = "UPDATE `class` SET capacity = $ec, price = $ep WHERE fnumber = $flightno AND classname = 'Economy'";
			mysqli_query($conn,$update3) or die('can not update class2');


			$update2 = "UPDATE `airplane` SET pname = '$airplanename2', pnumber = $flightno, eseats = $ec, bseats = $bc, tdate = '$ttime'";
			mysqli_query($conn,$update2) or die('can not update airplane');
			header('location:../View/adminpage.php');
		}
	}
	if (isset($_POST['btn_updateround'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// $flightno1 = $_POST['number'];
			$flightno = $_POST['flightno'];
			$airplaneid = $_POST['airplaneid'];
			$gtime = $_POST['gtime'];
			$rtime = $_POST['rtime'];
			$airport1 = $_POST['airport1'];
			$airport2 = $_POST['airport2'];
			$dtime = $_POST['dtime'];
			$atime = $_POST['atime'];
			$ec = $_POST['ecapacity'];
			$ep = $_POST['eprice'];
			$bc = $_POST['bcapacity'];
			$bp = $_POST['bprice'];
			$airplanename2 = $_POST['airplanename1'];


			if(empty($bp) || empty($bc) || empty($ep) || empty($ec) || empty($atime) || empty($airport1) || empty($dtime) || empty($airport2) || empty($gtime) || empty($rtime) || empty($airplaneid)){
				header('location:../View/adminpage.php?errflight=Fill all fields');
			}

			// $conn = mysqli_connect('localhost', 'root', 'vertrigo', 'airline');
			include('dbconnect.php');
			$update = "UPDATE `roundflights` SET fnumber = $flightno,aid = $airplaneid,gdate = '$gtime', rdate = '$rtime', airport1 = '$airport1', dtime = '$dtime', airport2 = '$airport2', atime = '$atime' WHERE fnumber = $flightno";
			mysqli_query($conn,$update) or die('can not update round');
			$update1 = "UPDATE `class` SET capacity = $bc, price = $bp WHERE fnumber = $flightno AND classname = 'Business'";
			mysqli_query($conn,$update1) or die('can not update class1');
			$update3 = "UPDATE `class` SET capacity = $ec, price = $ep WHERE fnumber = $flightno AND classname = 'Economy'";
			mysqli_query($conn,$update3) or die('can not update class2');
			$update2 = "UPDATE `airplane` SET pname = '$airplanename2', pnumber = $flightno, eseats = $ec, bseats = $bc, tdate = '$ttime'";
			mysqli_query($conn,$update2) or die('can not update airplane');
			header('location:../View/adminpage.php');
		}
	}
	if (isset($_POST['btn_delete_oneway'])) {
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$flightno1 = $_POST['flightno'];
			include('dbconnect.php');
			$delete = "DELETE FROM onewayflights WHERE fnumber = $flightno1";
			mysqli_query($conn,$delete) or die('can not delete');
			$delete = "DELETE FROM airplane WHERE pnumber = $flightno1";
			mysqli_query($conn,$delete) or die('can not delete');
			$delete = "DELETE FROM class WHERE fnumber = $flightno1";
			mysqli_query($conn,$delete) or die('can not delete');
			header('location:../View/adminpage.php');
		}
	}
	if (isset($_POST['btn_delete_round'])) {
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$flightno1 = $_POST['flightno'];
			include('dbconnect.php');
			$delete = "DELETE FROM roundflights WHERE fnumber = $flightno1";
			mysqli_query($conn,$delete) or die('can not delete');
			$delete = "DELETE FROM airplane WHERE pnumber = $flightno1";
			mysqli_query($conn,$delete) or die('can not delete');
			$delete = "DELETE FROM class WHERE fnumber = $flightno1";
			mysqli_query($conn,$delete) or die('can not delete');
			header('location:../View/adminpage.php');
		}
	}
?>