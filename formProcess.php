<?php


$errorMSG = "";


if (empty($_POST["fnae"])) {
    $errorMSG = "<li>Name is required</<li>";
} else {
    $fname = $_POST["fname"];
}

if (empty($_POST["lname"])) {
    $errorMSG .= "<li>Email is required</li>";
}else {
    $lname = $_POST["lname"];
}


if(empty($errorMSG)){

	$msg = true;

	echo json_encode(['code'=>200, 'msg'=>$msg]);

	exit;

}


echo json_encode(['code'=>404, 'msg'=>$errorMSG]);


?>