<?php
session_start();
include_once 'dbconnect.php';
$round = $_POST["round"];
$username = $_SESSION['username'];
    $sql = mysqli_query($conn,"DELETE FROM books WHERE flightype = '$round' AND username = '$username'");
    mysqli_close($conn);

    header('location:showhistory.php');
?>
