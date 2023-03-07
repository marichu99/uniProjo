<?php 
    // include php mail files
    require("PHPMailer.php");
    require("SMTP.php");
    require("Exception.php");

    // define the namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    // establish a database connection
    $conn=mysqli_connect("localhost","root","",);

    // connect to the specific database
    mysqli_select_db($conn,"farmer");


        if(isset($_POST["otp"]) and isset($_POST["email"])){
            $otp = $_POST["otp"];
            $email = $_POST["email"];
            // prevent sql injection
            $otp = mysqli_real_escape_string($conn, $otp);
            $email = mysqli_real_escape_string($conn, $email);
        }


        // function meant for redirection
        function Redirect($url){
            header(("Location:" . $url));
            exit();
        }
        // set the subject for the email
        $subject="REQUEST FOR PASSWORD CHANGE";

        // set the body for the email
        $body="The requested OTP for your password is ".$otp;

        echo $body;
        
        // create an instance of PHPMailer
        $mailer=new PHPMailer(true);

        // set mailer to user smtp
        $mailer-> isSMTP();

        // define smtp host
        $mailer-> Host="smtp.gmail.com";
        
        // enable smtp authentication
        $mailer->SMTPAuth=true;

        // set up the gamil username
        $mailer->Username="ukulimabora44@gmail.com";

        // set the email password
        

        // set the type of encryption
        $mailer->SMTPSecure="ssl";

        // set the port to connect to SMTP
        $mailer->Port=465;
        // set the sender email address
        $mailer->setFrom("ukulimabora44@gmail.com");

        $mailer->addAddress($email);
        echo $email;

        $mailer->isHTML(true);
        
        // set the email subject
        $mailer->Subject=$subject;

        // set the email body
        $mailer->Body=($body);
        $mailer->SMTPDebug=true;
        $sent= $mailer->send();
         if($sent){
            echo "
            <script type='text/javascript'>
                alert('Email sent successfully');
                window.location.href='forgotPass.php';
            </script>            
            ";
        }else{
            // close the smtp connection
            $mailer->smtpClose();
            echo "
            <script type='text/javascript'>
                alert('Something went wrong');
            </script>            
            ";
        }
    







?>