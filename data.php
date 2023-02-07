<?php
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

// prevent SQL INJECTION
// $fname=stripcslashes($fname);
// $lname=stripcslashes($lname);




// connect to the database
$conn = mysqli_connect("localhost", "root", "");
// $fname=mysqli_real_escape_string($conn,$fname);
// $lname=mysqli_real_escape_string($conn,$lname);
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

    $_SESSION["Username"] = $row["FirstName"];
    $_SESSION["Password"] = $row["Password"];

    $jsonData=json_encode(($this_Obj),JSON_UNESCAPED_UNICODE);
    echo $jsonData;
}else{
    echo '<script type= "text/javascript">';
    echo 'window.location.href = "login.php";';
    echo 'alert("Invalid Username or Password");';    
    echo '</script>';
}
if(isset($_SESSION["Username"])){
    Redirect("/PROJO/index.html");
}




?>

