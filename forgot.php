<?php 
if(isset($_POST["forgot"])){
    $forgot = $_POST["forgot"];
    $forgot = stripcslashes($forgot);
}
// establish a database connection

$conn=mysqli_connect("localhost","root","","farmer");

// prevent sql injection
$forgot = mysqli_real_escape_string($conn, $forgot);

// connect to the specific database
// $valid=mysqli_select_db($conn,"farmer");


// query the database for the password according to the email passed
$query = "select Password,Email from farmer where Email = '$forgot'";

$res=mysqli_query($conn,$query) or die("Failed to fetch from db");

$row = mysqli_fetch_array($res);

// unhash the password

$email = $row["Email"];

// compare the email passed with the email fetched from the database
if ($email == $forgot){
    print(json_encode($email));
}else{
    print("User not found");
}





?>