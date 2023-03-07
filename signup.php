<?php 
// get the date information
$date=date("m/d/y");

// import defined function files
require("data.php");

// get the form data
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$uname = $_POST["uname"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordRe=$_POST["passwordRE"];


// prevent SQLINJECTION
$fname = stripcslashes($fname);
$lname = stripcslashes($lname);
$email = stripcslashes($email);
$uname= stripcslashes($uname);
$password = stripcslashes($password);
$passwordRE= stripcslashes($passwordRe);

// configure a database connection
$conn = mysqli_connect("localhost", "root", "");

// prevent escape sequences
$fname = mysqli_real_escape_string($conn, $fname);
$lname = mysqli_real_escape_string($conn, $lname);
$uname= mysqli_real_escape_string($conn,$uname);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$passwordRe=mysqli_real_escape_string($conn,$passwordRe);

if($password != $passwordRe){
    echo "
        <script type='text/javascript'>
            alert('Passwords do not match');
            window.location.href='Sign.php';
        </script>
    ";
    mysqli_close($conn);
    exit(0);
}
// select the database
mysqli_select_db($conn, "farmer");

// check the availability of the username
$sql="select * from users where userName='$uname'";
$query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$result=mysqli_num_rows($query);
if($result>0){
    echo "
        <script type='text/javascript'>
            alert('The username is already taken, kindly choose another one');
            window.location.href='Sign.php';
        </script>
    ";
    mysqli_close($conn);
    exit(0);
}

// function to redirect the header
function redirect($url){

    header("Location:" . $url);
    exit();
}

// hash the password
$password = password_hash($password, PASSWORD_DEFAULT);

// query the database
$sql="INSERT INTO users (FirstName,LastName,Email,Password,userName) VALUES ('$fname','$lname','$email','$password','$uname')";

// query the database
$result = mysqli_query($conn, $sql);

// check whether a user exists
if(!$result){
    $error = mysqli_error($conn);
    redirect("Sign.php?error='User Already Exists'");
    exit(0);
}else{
    // get the number of rows affected
    $res = mysqli_affected_rows($conn);


    // query the database for the newly updated user
    $query="select * from users where Email ='$email'";
    $rezult=mysqli_query($conn,$query) or die(mysqli_error($conn));
    $rows=mysqli_fetch_assoc($rezult);

    if ($rows>0){
        // start a session
        session_start();

        $_SESSION["Username"] = $rows["userName"];
        $_SESSION["Password"] = $rows["Password"];

    echo $_SESSION["Username"];
    if(isset($_SESSION["Username"])){
        $logs=update_log($rows["userName"],$email,"SignUp",$date,$conn);
        if($logs>0){
            echo '<script type= "text/javascript">';
            echo 'alert("User Login Successful");';    
            echo 'window.location.href = "userLand.php";';
            echo '</script>';
        }
    }
    }

    }




?>