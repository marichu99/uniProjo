<?php 
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
         $mailer->Subject="CONFIRMATION OF INQUIRY";

         // set the email body
         $mailer->Body="We have received your email queries and we will get back to you as soon as possible. Thanks anD Kind regrads";

        $mailer->send();

        // close the smtp connection
        $mailer->smtpClose();

    }

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

        if(isset($_POST["Email"]) and isset($_POST["Body"]) and isset($_POST["Subject"])){
            // set the sender email address
            $mailer->setFrom("ukulimabora444@gmail.com");

            $mailer->addAddress("ukulimabora444@gmail.com");

            $mailer->isHTML(true);

            // set the email subject
            $mailer->Subject=$_POST["Subject"];

            // set the email body
            $mailer->Body=$_POST["Email"].$_POST["Body"];
        }
        // send the email
        $mailer->send();
        if($mailer->send()){
            sendToSender($_POST["Email"]);
            echo "
            <script type='text/javascript'>
                alert('Email sent successfully');
                window.location.href='contact.php';
            </script>           
            ";
            // close the smtp connection
             $mailer->smtpClose();
        }else{
            echo "
            <script type='text/javascript'>
                alert('Something went wrong');
            </script>           
            ";
            // close the smtp connection
            $mailer->smtpClose();
        }
        
        
    }
?>