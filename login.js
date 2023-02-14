        
      
        // functions to check Form Validation
        var truly_valid= true;
        function formValidation(){
            // LOGIN FORM
        var email = document.getElementById("email")
        console.log(email.value)
        var emailValidation=document.getElementById("emailValidation")
        if (email.value.length < 5){
          emailValidation.textContent="Please enter an email address"
          emailValidation.style.color= "red"
          truly_valid= false;
        }
        var password = document.getElementById("password")
        console.log(password.value)
        var passwordValidation= document.getElementById("passwordValidation")
        if(password.value.length < 5){
          passwordValidation.textContent="Please enter a password"
          passwordValidation.style.color="red"
          truly_valid=false;
        }
        if(truly_valid === true){
          getBackenData()
        }

        // SIGN UP DATA
        // email Sign Up Text Box
        var emailSign= document.getElementById("emailSign");
        console.log(emailSign.value)
        var emailSignValid= document.getElementById("emailSignValid");
        if (emailSign.value.length < 5){
            emailSignValid.textContent="Please enter an email address"
            emailSignValid.style.color= "red"
            truly_valid= false;
          }
        // password Sign Up TextBox
        var passwordSign = document.getElementById("passwordSign")
        console.log(passwordSign.value)
        // store all special characters in a variable
        var special = /^[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/
        var contAlphaNumeric= special.test(passwordSign.value)
        var passwordSignValid= document.getElementById("passwordSignValid")
        if(passwordSign.value.length < 5){
          passwordSignValid.textContent="Please enter a password"
          passwordSignValid.style.color="red"
          truly_valid=false;
        // check for special characters
        }else if(passwordSign.value > 5 && contAlphaNumeric !== true){
            var specialCharacter= document.getElementById("specialCharacter")
            specialCharacter.textContent="Please place speacial characters in your password"
            specialCharacter.style.color="red";
        }
        // confirm password and password
        // get the confirm password object
        var c_password = document.getElementById("passwordRe")
        console.log(c_password.value)
        var contains = passwordSign.value.localeCompare(c_password.value)
        console.log(contains)
        if(contains!==0 || c_password.value.length<5){
            passReValid.textContent="Passwords do not match"
            passReValid.style.color="red";
        }
        // first name textbox
        var firstSign= document.getElementById("firstSign");
        console.log(firstSign.value)
        var firstSignValid= document.getElementById("firstSignValid");
        if (firstSign.value.length < 5){
            firstSignValid.textContent="Please enter a first name"
            firstSignValid.style.color= "red"
            truly_valid= false;
          }
          var lastSign= document.getElementById("lastSign");
          console.log(lastSign.value)
          var lastSignValid= document.getElementById("lastSignValid");
          if (lastSign.value.length < 5){
            lastSignValid.textContent="Please enter a last name"
            lastSignValid.style.color= "red"
            truly_valid= false;
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

        function signRedirect(){
          window.location.href="http://localhost/PROJO/Sign.php"
        }





        // I WAS TRYING TO USE JS TO FETCH DATA FROM THE PHP BAKEND BUT WAS NOT SUCCESSFUL
    //     function getBackenData(){
    //     fetch("http://localhost/PROJO/data.php",{
    //         method:"GET",
    //         mode:"cors",
    //         headers:{"Content-type":"application/json"}
    //     })
    //     .then(res=>res.json())
    //     .then((data)=>{
    //         console.log(data)
    //         var backen = document.getElementById("backen");
    //         backen.textContent=data
    //     })
    // }
    //     function getBackenData(){
    //     var xhr = new XMLHttpRequest()
    //     let params ="action=getBackenData"
    //     // use open method to initialize the GET XMLHttpRequest
    //     xhr.open("GET","data.php",true);
        
    //     xhr.onreadystatechange = function (){
    //     // check the statuse of the XMLHttpRequest
    //     if (xhr.readyState === 4 && xhr.status === 200){
    //         // get the data from the response
    //         console.log("marichu is best")
    //         console.log(xhr.response)
    //         var data = JSON.parse(xhr.responseText)
    //         console.log("The type of data is ",typeof(data))
    //         alert(data)
    //       }
    //     }
    //     xhr.setRequestHeader("Content-Type","application/json")
    //     // send the request
    //     xhr.send(params)
    //   }
            
