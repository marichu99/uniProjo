    function formValidation(){
    var email = document.getElementById("email")
    console.log(email.value)
    var emailValidation=document.getElementById("emailvalidation")
    if (email.value.length < 5){
      emailValidation.textContent="Please enter an email address"
      emailValidation.style.color= "red"
      truly_valid= false;
    }
    var password = document.getElementById("password")
    console.log(password.value)
    var passwordValidation= document.getElementById("passwordvalidation")
    if(password.value.length < 5){
      passwordValidation.textContent="Please enter a password"
      passwordValidation.style.color="red"
      truly_valid=false;
    }
    if(truly_valid === true){
      getBackenData()
    }
    }
    document.getElementById("emailvalidation")
    var logDiv= document.querySelector("#signUpDiv")
    logDiv.addEventListener("keyup",(e)=>{
      document.getElementById("emailvalidation").textContent=""
    })
    // functions to remove error messages when users type in their passwords
    function checkFormValidation(e){
      if (e.target.value.length > 0){
        if (e.target.id === "email"){
          document.getElementById("emailvalidation").textContent=""
        }
      }
      if(e.target.value.length >0){
        if (e.target.id === "password"){
          document.getElementById("passwordvalidation").textContent=""
        }
      }
    }
