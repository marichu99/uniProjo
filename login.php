
<php
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
              <button class="toggle-btn" onclick="signRedirect()">Sign Up</button>
            </div>
           <form method="POST" action="data.php" id="login" class="input-group">
            <div class="loginDiv">
            <input type="email" id="email" placeholder="Enter your Email address" name="email" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="password" id="password" placeholder="Enter your password" name="password" required class="input-box" onchange="checkFormValidation(event)" onkeyup="checkFormValidation(event)"><br>
            <input type="submit" id="submit" class="btn-submit" onclick="formValidation()"><br>
            <p onclick="window.location.href='forgot.html'">Forgot Password</p>

            <p id="emailValidation"></p>
            <p id="passwordValidation"></p>
               
               </div>
           </form>
                 

        </div>
      </div>
      <script src="login.js" type="text/javascript"></script>
      
    </body>
    
</html>
?>