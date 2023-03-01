<?php 
    session_start();
    // configure a database connection
    $conn=mysqli_connect("localhost","root","");


    if(isset($_FILES["farmerIMG"])){
        $farmerIMG=$_FILES["farmerIMG"];
        
    }
    if(isset($_FILES["IDimage"])){
        $IDimage=$_FILES["IDimage"];
    }
    if(isset($_FILES["Compliance"])){
        $Compliance=$_FILES["Compliance"];
    }
    if(isset($_POST["KRAPin"])){
        $KRAPin=$_POST["KRAPin"];
        $KRAPin=stripcslashes($KRAPin);
        $KRAPin=mysqli_real_escape_string($conn,$KRAPin);
        echo $KRAPin;
    }

    



    // connect to the specific database
    mysqli_select_db($conn,"farmer");

    if(isset($_SESSION["Username"])){
        $username=$_SESSION["Username"];
    }

    // get the email of the seller
    $firstName=$_SESSION["Username"];

    $getEmail="select * from users where userName = '$firstName'";
    $query=mysqli_query($conn,$getEmail) or die(mysqli_error($conn));
    $farmerDeets=mysqli_fetch_assoc($query);
    $farmerID=$farmerDeets["Email"];


    // insert the data into the database
    $inputQuery="insert into farmer(farmerID,farmerIMG,farmerName,IDImage,KRAPin,Compliance) values ('$farmerID','$farmerIMG','$username','$IDimage','$KRAPin','$Compliance')";
    $inputResult=mysqli_query($conn,$inputQuery);
    $userExists="Duplicate entry '$farmerID' for key 'PRIMARY'";
    $error=mysqli_error($conn);
    if($error == $userExists){
        echo "
            <script type='text/javascript'>
                alert('This user already has a pending review');
                window.location.href='userLand.php';
            </script>
        ";
    }


    // include php mail files
    require("PHPMailer.php");
    require("SMTP.php");
    require("Exception.php");

    // define the namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    function sendToSender($email,$subject=null,$body=null){
        // create an instance of PHPMailer
        $mailer=new PHPMailer(true);

        // set mailer to user smtp
        $mailer-> isSMTP();

        // define smtp host
        $mailer-> Host="smtp.gmail.com";
        
        // enable smtp authentication
        $mailer->SMTPAuth=true;

        // set up the gamil username
        $mailer->Username="ukulimabora444@gmail.com";

        // set the email password
        $mailer->Password="yhflmjmxendctsmp";

        // set the type of encryption
        $mailer->SMTPSecure="ssl";

        // set the port to connect to SMTP
        $mailer->Port=465;
        // set the sender email address
        $mailer->setFrom("ukulimabora444@gmail.com");

        $mailer->addAddress($email);

        $mailer->isHTML(true);
        
         // set the email subject
         $mailer->Subject="CONFIRMATION ON DETAILS FOR REVIEW";

         // set the email body
         $mailer->Body="We have received your various details for review and we will get back to you as soon as possible. Thanks and kind regards";

        $mailer->send();

        
        // close the smtp connection
        $mailer->smtpClose();

        return true;

    }
    function sendWithAttachments($farmerID,$KRAPin,$IDimage,$Compliance){
        if(isset($_POST["submit"])){
        
            // create an instance of PHPMailer
            $mailer=new PHPMailer(true);

            // set mailer to user smtp
            $mailer-> isSMTP();

            // define smtp host
            $mailer-> Host="smtp.gmail.com";
            
            // enable smtp authentication
            $mailer->SMTPAuth=true;

            // set up the gamil username
            $mailer->Username="ukulimabora444@gmail.com";

            // set the email password
            $mailer->Password="yhflmjmxendctsmp";

            // set the type of encryption
            $mailer->SMTPSecure="ssl";

            // set the port to connect to SMTP
            $mailer->Port=465;

            // set the sender email address
            $mailer->setFrom("ukulimabora444@gmail.com");

            $mailer->addAddress("ukulimabora444@gmail.com");
    
            
            if(isset($_FILES["IDimage"]) and isset($_FILES["Compliance"])){
                // add the various attachments needed       

                $mailer->addAttachment($_FILES["IDimage"]["tmp_name"],$_FILES["IDimage"]["name"]);
                $mailer->addAttachment($_FILES["Compliance"]["tmp_name"],$_FILES["Compliance"]["name"]);
            }

            $mailer->isHTML(true);

            // set the email subject
            $mailer->Subject="SUBMISSION OF REQUIRED DOCUMENTS FOR REVIEW";

            // set the email body
            $mailer->Body="Attached herein kindly find my details for your review to expedite the selling process"."      "."The KRA PIN is".$KRAPin;
            // send the email
            $mailer->send();
            if($mailer->send()){
                $sent=sendToSender($farmerID);           
        
                // close the smtp connection
                $mailer->smtpClose();
                return true;
            }else{
                echo "sending to the email went wrong";
                // close the smtp connection
                $mailer->smtpClose();
                return false;
            }
        }
    }

    if($inputResult){
        $success=sendWithAttachments($farmerID,$KRAPin,$IDimage,$Compliance);
        if($success){
        echo "<script type='text/javascript'>";
        echo "alert('Your details have been saved and are under review');";
        echo "window.location.href='userLand.php';";
        echo "</script>";
        }
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('Something went wrong');";
        echo "window.location.href='sellerDetails.php';";
        echo "</script>";
    }
?>