<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="farmer.css">
</head>
<body>

    <div class="marichu">
        <div class="login">      
           </form>
           <form method="POST" action="signup.php"  id="signup" class="input-group">
           <div class="signUpDiv">
           <h3>Type in your credentials below</h3>
            <input type="text" id="firstSign" placeholder="Enter your First Name" name="fname" class="input-box" required onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="text" id="lastSign" placeholder="Enter your Last Name" name="lname" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="email" id="emailSign" placeholder="Enter your Email address" name="email" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="password" id="passwordSign" placeholder="Enter your password" name="password" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="password" id="passwordRe" placeholder="Confirm your password" name="password" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="submit" id="submit" class="btn-submit" onclick="formValidation()"><br>
            <?php 
                if (isset($_GET["error"])){
                $error=$_GET["error"];
                // paste the error to the html form
                echo "<p>This User Already Exists</p>";
                echo "<a href='login.php'>Login</a>";
                }
            ?>
            <p id="firstSignValid"></p>
            <p id="specialCharacter"></p>
            <p id="lastSignValid"></p>
            <p id="emailSignValid"></p>
            <p id="passwordSignValid"></p>
            <p id="passReValid"></p>           
           </div>
           </form>     

        </div>
      </div>
      <script src="sign.js" type="text/javascript"></script>
</body>
</html>