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
            <input type="text" id="first" placeholder="Enter your First Name" name="fname" class="input-box" required><br>
            <input type="text" id="last" placeholder="Enter your Last Name" name="lname" required class="input-box"><br>
            <input type="email" id="email" placeholder="Enter your Email address" name="email" required class="input-box"><br>
            <input type="password" id="password" placeholder="Enter your password" name="password" required class="input-box"><br>
            <input type="password" id="password" placeholder="Confirm your password" name="password" required class="input-box"><br>
            <input type="submit" id="submit" class="btn-submit"><br>
           </form>           
        </div>
      </div>
      <script>
        var x= document.getElementById("login")
        var y= document.getElementById("signup")
        var z= document.getElementById("buttonz")
        // functions to slide in between login and sign up pages
        function login(){
          x.style.left="50px";
          y.style.left="450px";
          z.style.left="0px"
        }
        function signup(){
          x.style.left="-400px";
          y.style.left="50px";
          z.style.left="110px"
  
        }
        // functions to check Form Validation
        function formValidation(){
        var email = document.getElementById("email")
        console.log(email.value)
        var emailValidation=document.getElementById("emailValidation")
        if (email.value.length < 5){
          emailValidation.textContent="Please enter an email address"
          emailValidation.style.color= "red"
        }
        var password = document.getElementById("password")
        console.log(password.value)
        var passwordValidation= document.getElementById("passwordValidation")
        if(password.value.length < 5){
          passwordValidation.textContent="Please enter a password"
          passwordValidation.style.color="red"
        }
        }
        document.getElementById("emailValidation")
        var logDiv= document.querySelector("#loginDiv")
        logDiv.addEventListener("keyup",(e)=>{
          document.getElementById("emailValidation").textContent=""
        })
        // functions to remove error messages when users type in their passwords
        function checkFormValidation(e){
          if (e.target.value.length > 0){
            if (e.target.id === "email"){
              document.getElementById("emailValidation").textContent=""
            }
          }
          if(e.target.value.length >0){
            if (e.target.id === "password"){
              document.getElementById("passwordValidation").textContent=""
            }
          }
        }
      </script>
      
    </body>
    
</html>
