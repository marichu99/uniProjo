

<!DOCTYPE html>
<html>
    <head>
      <link href="farmer.css" rel="stylesheet">
    </head>
    <body>
      <div class="marichu">
        <div class="login">
            <div class="button-box">
              <div id="buttonz"></div>
              <button class="toggle-btn" onclick="login()">Login</button>
              <button class="toggle-btn" onclick="signup()">Signup</button>
            </div>
           <form method="POST" action="data.php" id="login" class="input-group">
            <div class="loginDiv">
            <input type="email" id="email" placeholder="Enter your Email address" name="email" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="password" id="password" placeholder="Enter your password" name="password" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="submit" id="submit" class="btn-submit" onclick="formValidation()"><br>
            <p id="emailValidation"></p>
            <p id="passwordValidation"></p>
               
               </div>
           </form>
           <form method="POST" action="signup.php"  id="signup" class="input-group">
           <div class="signUpDiv">
            <input type="text" id="firstSign" placeholder="Enter your First Name" name="fname" class="input-box" required onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="text" id="lastSign" placeholder="Enter your Last Name" name="lname" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="email" id="emailSign" placeholder="Enter your Email address" name="email" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="password" id="passwordSign" placeholder="Enter your password" name="password" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="password" id="passwordRe" placeholder="Confirm your password" name="password" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="submit" id="submit" class="btn-submit" onclick="formValidation()"><br>
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
      <script src="login.js" type="text/javascript"></script>
      
    </body>
    
</html>
