<?php 
// get the form data
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];


// prevent SQLINJECTION
$fname = stripcslashes($fname);
$lname = stripcslashes($lname);
$email = stripcslashes($email);
$password = stripcslashes($password);

// configure a database connection
$conn = mysqli_connect("localhost", "root", "");

// prevent escape sequences
$fname = mysqli_real_escape_string($conn, $fname);
$lname = mysqli_real_escape_string($conn, $lname);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// select the database
mysqli_select_db($conn, "farmer");

// hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

// query the database
$sql="INSERT INTO users (FirstName,LastName,Email,Password) VALUES ('$fname','$lname','$email','$password')";

$result = mysqli_query($conn, $sql);

if(!$result){
    die(mysqli_error($conn));
}

$rows = mysqli_affected_rows($conn);

// function to redirect the header
function redirect($url){

    header("Location:" . $url);
    exit();
}

if ($rows>0){
    redirect(('/PROJO/'));
    // encode the data from the database and send it to the javascript frontend
    echo json_encode($fname);
}


?>