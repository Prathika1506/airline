
<?php
$flightno = $_GET['flightno'];
include_once 'dbconnect.php';

$var = array();
$sql = "SELECT * FROM onewayflights WHERE fnumber = $flightno";
if(! ($result = mysqli_query($conn, $sql)))
{
	
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
else
{
	while($row = mysqli_fetch_object($result))
	{
		$var[] = $row;	
	}
	echo '{"flights":'.json_encode($var).' , ';
}

$var3 = array();
$sql = "SELECT * FROM airplane WHERE pnumber = $flightno";
if(! ($result = mysqli_query($conn, $sql)))
{
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
else
{
	while($row = mysqli_fetch_object($result))
	{
		$var3[] = $row;	
	}
	echo '"airplane":'.json_encode($var3).',';
}


$var2 = array();
$sql = "SELECT * FROM class WHERE fnumber = $flightno AND classname = 'Economy'";
if(! ($result = mysqli_query($conn, $sql)))
{
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
else
{
	while($row = mysqli_fetch_object($result))
	{
		$var2[] = $row;	
	}
	echo '"classeseconomy":'.json_encode($var2).',';
}

$var4 = array();
$sql = "SELECT * FROM class WHERE fnumber = $flightno AND classname = 'Business'";
if(! ($result = mysqli_query($conn, $sql)))
{
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
else
{
	while($row = mysqli_fetch_object($result))
	{
		$var4[] = $row;	
	}
	echo '"classesbusiness":'.json_encode($var4).'}';
}
mysqli_close($conn);


?>