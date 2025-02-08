<?php    
// Starting the session, necessary 
// for using session variables 
session_start(); 
// Declaring and hoisting the variables 
$username = ""; 
$email    = ""; 
$errors = array();  
$_SESSION['success'] = "";  
$db = mysqli_connect('localhost', 'root', 'vertrigo', 'airline'); 
// Registration code 
if (isset($_POST['reg_user'])) { 
    
    $fname = mysqli_real_escape_string($db, $_POST['fname']); 
    $lname = mysqli_real_escape_string($db, $_POST['lname']); 
    $username = mysqli_real_escape_string($db, $_POST['username']); 
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confpass = mysqli_real_escape_string($db, $_POST['confpass']); 
    $sex = mysqli_real_escape_string($db, $_POST['sex']); 
    $age = mysqli_real_escape_string($db, $_POST['age']); 
    $email = mysqli_real_escape_string($db, $_POST['email']); 
    $phone = mysqli_real_escape_string($db, $_POST['phone']); 
    $passport = mysqli_real_escape_string($db, $_POST['passport']); 
    $homenum = mysqli_real_escape_string($db, $_POST['homenum']); 
    $street = mysqli_real_escape_string($db, $_POST['street']); 
    $city = mysqli_real_escape_string($db, $_POST['city']); 
    // Ensuring that the user has not left any input field blank 
    if (empty($fname)) { array_push($errors, "Username is required"); } 
    if (empty($lname)) { array_push($errors, "Username is required"); } 
    if (empty($username)) { array_push($errors, "Username is required"); } 
    if (empty($password)) { array_push($errors, "Username is required"); } 
    if (empty($confpass)) { array_push($errors, "Username is required"); } 
    if (empty($sex)) { array_push($errors, "Username is required"); } 
    if (empty($age)) { array_push($errors, "Username is required"); } 
    if (empty($email)) { array_push($errors, "Username is required"); } 
    if (empty($phone)) { array_push($errors, "Username is required"); } 
    if (empty($passport)) { array_push($errors, "Username is required"); } 
    if (empty($homenum)) { array_push($errors, "Username is required"); } 
    if (empty($street)) { array_push($errors, "Username is required"); } 
    if (empty($city)) { array_push($errors, "Username is required"); } 

    if ($password != $confpass) { 

        array_push($errors, "The two passwords do not match");
    } 
    // If the form is error free, then register the user 

    if (count($errors) == 0) { 
        // Password encryption to increase data security 

        $passwor = md5($password); 
        $confpas = md5($confpass);
        // Inserting data into table 

        $query = "INSERT INTO passanger VALUES('$fname','$lname','$username','$passwor','$confpas','$sex','$age','$email','$phone','$passport','$homenum','$street','$city')";
        mysqli_query($db, $query); 

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You have logged in"; 
        header('location: hom.php');  

    } 
} 

   
// User login 

if (isset($_POST['login_user'])) { 
    
    $username = mysqli_real_escape_string($db, $_POST['username']); 
    $password = mysqli_real_escape_string($db, $_POST['password']);
      
        $passwor = md5($password);
        $query = "SELECT username,password FROM passanger WHERE username= '$username' AND password='$passwor'"; 

        $results = mysqli_query($db, $query); 
        if($username == 'admin' && $password == 1234){
            
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You have logged in!";
            header('location:adminpage.php');
        }
        else if (mysqli_num_rows($results) > 0) { 
            $_SESSION['username'] = $username; 
            $_SESSION['success'] = "You have logged in!"; 
            header('location: hom.php'); 

        } 

        else { 
            header("location:signin.php?error=Incorrect username or password");  

        }   
} 
   
?> 