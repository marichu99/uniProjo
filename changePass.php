<?php 

    
    $conn=mysqli_connect("localhost","root","") or die("EROOR CONNECTING TO DB");
    mysqli_select_db($conn,"farmer");
    echo "HIIIIII";
    echo isset($_POST["submitPass"]);

    if(isset($_POST["password"]) && isset($_POST["email"])){
        echo "All are set";
        $email=$_POST["email"];
        $email=mysqli_real_escape_string($conn,$email);
        echo $email;
        $password=$_POST["password"];
        $password=mysqli_real_escape_string($conn,$password);
        
        // check whether this user exists
        $userExistSql="select * from users where Email ='$email'";
        $query=mysqli_query($conn,$userExistSql) or die(mysqli_error($conn));
        $rows=mysqli_num_rows($query);
        if ($rows<1){
            echo '<script type= "text/javascript">';
            echo 'alert("User does not exist");';    
            echo 'window.location.href = "forgotPass.php";';
            echo '</script>';
            mysqli_close($conn);
            exit(0);
        }else{
            // hash the passwords received
            $changePassHash=password_hash($password,PASSWORD_DEFAULT);
            echo $changePassHash;
            $changepasSql="update users set Password='$changePassHash' where Email='$email'";
            $query=mysqli_query($conn,$changepasSql) or die(mysqli_error($conn));
            $rows=mysqli_affected_rows($conn);
            if($rows >0){
                echo '<script type= "text/javascript">';
                echo 'alert("Password change successful, you can now login using your credentials");';    
                echo 'window.location.href = "login.php";';
                echo '</script>';
                header("Location:login.php");
            }
        }
    }


?>