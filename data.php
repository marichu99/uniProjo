<?php
session_start();
// GET TODAYS TIME
$time=time();
$date=date("m/d/y",$time);

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
global $conn;
$conn = mysqli_connect("localhost", "root", "");
$email=mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);
mysqli_select_db($conn,"farmer"); 
// query database
// function Redirect($url){
//     header(("Location:" . $url));
//     exit();
// }

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

// a function to updat ethe log tables

function update_log($UserName,$UserID,$action_type,$timeStamp,$conn){
    // come up with the query 
    if($action_type == "Buy"){
        $action="Buy request made";
    }else if($action_type == "Sell"){
        $action="Sell request Made";
    }else if($action_type == "Approval"){
        $action="Seller approval request made";
    }else if($action_type == "Login"){
        $action="User Login to the System";
    }else if($action_type == "SignUp"){
        $action="New User Has Signed up into the system";
    }else if($action_type == "Logout"){
        $action="User Logout from the System";
    }else if($action_type == "Forgot"){
        $action="User has requested to change passwords";
    }
    $sql="INSERT INTO logs(UserName,userID,action,timeStamp) VALUES('$UserName','$UserID','$action','$timeStamp')";
    mysqli_query($conn,$sql);
    $rows=mysqli_affected_rows($conn); 
    return $rows;
}

if (is_array($row) && $verifyPass ==1 ){
    // start a session
    session_start();

    $_SESSION["Username"] = $row["userName"];
    $_SESSION["Password"] = $row["Password"];

   echo $_SESSION["Username"];
   if(isset($_SESSION["Username"])){
        $logs=update_log($row["userName"],$email,"Login",$date,$conn);
        if($logs>0){
            echo '<script type= "text/javascript">';
            echo 'alert("User Login Successful");';    
            echo 'window.location.href = "userLand.php";';
            echo '</script>';
        }
}
}else{
    echo '<script type= "text/javascript">';
    echo 'alert("Invalid Username or Password");';    
    echo 'window.location.href = "login.php";';
    echo '</script>';
}





?>

