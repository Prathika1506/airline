<?php
session_start();
unset($_SESSION['username']);
// destroy_session();
header("Location: hom.php");
?>