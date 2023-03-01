        // the below variable is used to set error state in code
        var truly_valid=true;
        function formValidation(){
        // SIGN UP DATA
        // email Sign Up Text Box
        var emailSign= document.getElementById("emailSign");
        console.log(emailSign.value)
        var emailSignValid= document.getElementById("emailSignValid");
        if (emailSign.value.length < 5){
            error=true;
            emailSignValid.textContent="Please enter an email address"
            emailSignValid.style.color= "red"
            truly_valid= false;
          }else{
            truly_valid=true;
          }
        if(emailSign.value.includes("@") === false){
          emailSignValid.textContent="Please include @ in your text"
          truly_valid=false;
        }else{
          truly_valid=true;
        }
          
        // password Sign Up TextBox
        var passwordSign = document.getElementById("passwordSign")
        console.log("The password is",passwordSign.value)
        // store all special characters in a variable
        var special=  /\d/
        var contAlphaNumeric= special.test(passwordSign.value)
        console.log(typeof(String(passwordSign.value)))
        console.log("Does is contain",contAlphaNumeric)
        var passwordSignValid= document.getElementById("passwordSignValid")
        if(passwordSign.value.length < 5){
          passwordSignValid.textContent="Please enter a password"
          passwordSignValid.style.color="red"
          truly_valid=false;
        // check for special characters
        }else if(passwordSign.value.length > 5 && contAlphaNumeric !== true){
            truly_valid=false;
            var specialCharacter= document.getElementById("specialCharacter")
            specialCharacter.textContent="Please place numbers in your password"
            specialCharacter.style.color="red";
        }else{
          truly_valid=true;
        }
        // confirm password and password
        // get the confirm password object
        var c_password = document.getElementById("passwordRe")
        console.log("The confirm pass is",c_password.value)
        var contains = String(passwordSign.value).localeCompare(c_password.value)
        console.log("Do they match",contains)
        if(c_password.value.length<8){
            passReValid.textContent="Passwords needs to be 8 characters long"
            passReValid.style.color="red";
            var passRe=document.getElementById("passwordRe")
            passRe.textContent=" ";
            truly_valid=false;

        }else{
           if(contains !==0){
            truly_valid=false;
          passReValid.textContent="Passwords do not match"
          passReValid.style.color="red";
          var passRe=document.getElementById("passwordRe")
          passRe.textContent=" "
           }else{
            truly_valid=true;
          }
      }
        // first name textbox
        var firstSign= document.getElementById("firstSign");
        console.log(firstSign.value)
        var firstSignValid= document.getElementById("firstSignValid");
        if (firstSign.value.length < 5){
            firstSignValid.textContent="Please enter a first name"
            firstSignValid.style.color= "red"
            truly_valid= false;
          }else{
            truly_valid=true;
          }
          // last name textbox
          var lastSign= document.getElementById("lastSign");
          console.log(lastSign.value)
          var lastSignValid= document.getElementById("lastSignValid");
          if (lastSign.value.length < 5){
            lastSignValid.textContent="Please enter a last name"
            lastSignValid.style.color= "red"
            truly_valid= false;
            }else{
              truly_valid=true;
            }
          // username textbox
          var uname=document.getElementById("username");
          var unameValid=document.getElementById("userNameValid")
          if(uname.value.length<5){
            truly_valid=false;
            unameValid.textContent="Please enter a longer username";
            unameValid.style.color="red";
          }else{
            truly_valid=true;
          }
        }
        // functions to remove error messages when users type in their passwords
        function checkFormValidation(e){
            if (e.target.value.length > 0){
              if (e.target.id === "email"){
                document.getElementById("emailValidation").textContent=""
              }else if(e.target.id === "emailSign"){
                  document.getElementById("emailSignValid").textContent=""
              }else if(e.target.id === "passwordSign"){
                  document.getElementById("passwordSignValid").textContent=""
                  // remove the special characters error message 
                  document.getElementById("specialCharacter").textContent=""
              }else if(e.target.id === "passwordRe"){
                  // remove the the confirm password error message
                  document.getElementById("passReValid").textContent=""
              }else if(e.target.id === "firstSign"){
                  document.getElementById("firstSignValid").textContent=""
              }else if(e.target.id === "lastSign"){
                  document.getElementById("lastSignValid").textContent=""
              }
            }
            if(e.target.value.length >0){
              if (e.target.id === "password"){
                document.getElementById("passwordValidation").textContent=""
              }
            }
          }

          // check if all details are valid then allow the user to submit
          var submit=document.getElementById("submit")
          if(truly_valid === false){
            submit.disabled=true;
          }else{
            submit.disabled=false;
          }
  
  
