<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
// get the form data
// $fname=$_POST['fname'];
// $lname=$_POST['lname'];
$password = "";
if(isset($_POST["email"])){
    $email=$_POST["email"];
    $email=stripcslashes($email);
}
if (isset($_POST["password"])) {
    $password = $_POST["password"];
    $password=stripcslashes($password);

}


// connect to the database
$conn = mysqli_connect("localhost", "root", "");
$email=mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);
mysqli_select_db($conn,"farmer"); 
// query database
function Redirect($url){
    header(("Location:" . $url));
    exit();
}

// hash the input password
$passHash = password_hash($password, PASSWORD_DEFAULT);
$sql = "select * from users where Email = '$email'";
// query the database
$result = mysqli_query($conn,$sql) or die("Failed to Fetch from DB");
$row = mysqli_fetch_array(($result));


// verify the hashed password is equal to the database password
$dbpass = $row["Password"];

// echo implode($row);
// echo $dbpass;
$verifyPass = password_verify($password, $dbpass);

echo $verifyPass;

$data = array();



// close the connection 
// mysqli_close($conn);
// create an object
// $this_Obj = new stdClass;

class userDeets{
    public $fname;
}
$this_Obj = new userDeets;
$this_Obj->fname = $userName;


if (is_array($row) && $verifyPass ==1 ){
    // start a session
    session_start();

    $_SESSION["Username"] = $row["userName"];
    $_SESSION["Password"] = $row["Password"];

   echo $_SESSION["Username"];
   if(isset($_SESSION["Username"])){
    echo '<script type= "text/javascript">';
    echo 'alert("User Login Successful");';    
    echo 'window.location.href = "userLand.php";';
    echo '</script>';
}
}else{
    echo '<script type= "text/javascript">';
    echo 'alert("Invalid Username or Password");';    
    echo 'window.location.href = "login.php";';
    echo '</script>';
}





?>

