<?php 
// get the form data
// $fname=$_POST['fname'];
// $lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];

// prevent SQL INJECTION
// $fname=stripcslashes($fname);
// $lname=stripcslashes($lname);
$email=stripcslashes($email);
$password=stripcslashes($password);




// connect to the database
$conn = mysqli_connect("localhost", "root", "");
// $fname=mysqli_real_escape_string($conn,$fname);
// $lname=mysqli_real_escape_string($conn,$lname);
$email=mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);
mysqli_select_db($conn,"farmer");
// query database

$sql = "select * from users where Email = '$email' and Password ='$password'";
$result = mysqli_query($conn,$sql) or die("Failed to Fetch from DB");
$row = mysqli_fetch_array(($result));
if ($row['Email']==$email){
    echo 'Login Successful Welcome'.$row['FirstName'];
} else {
    echo "Record not found";
}







?>
