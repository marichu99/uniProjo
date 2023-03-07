<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot.css">
</head>
<body>
    <div class="main" >
        <div class="forgot">
            <h2 class="forgotText">Please enter your email at the textbox below</h2> 
            <div class="forgotBox" >
                <form class="form" onsubmit="return false;">
                    <input type="text" placeholder="john@doe.com" name="email" id="forgot" required/><br/>
                    <input type="submit" value="GET OTP" name="submit" onclick="formValidation()" class="passChange">
                </form>
                <form class="form" action="changePass.php">
                    <input type="number" placeholder="Input OTP code sent to your email" name="otp" id="otp" disabled onchange="checkOtp(event)" onkeyup="checkOtp(event)"/><br/>
                    <input type="password" placeholder="Enter a new Password" name="password" id="passwordSign" disabled/><br/>
                    <input type="password" placeholder="Re-Enter your Password" name="new_pass_confirm" id="passwordRe" disabled/><br/>
                    <input type="submit" name="submitPass" value="Change password" disabled id="passChange" class="passChange" onclick="passwordChange()">
                </form>
            </div>
        </div>
    </div>    
</body>
<script type="text/javascript">

    // get the various elements
    var otp=document.getElementById("otp");
    var passwordSign=document.getElementById("passwordSign");
    var passwordRe=document.getElementById("passwordRe");
    var emails=document.getElementById("forgot");
    var passChange=document.getElementById("passChange");
    var randNo=Math.ceil(Math.random()*123456)
    function formValidation(){
        passwordRe.disabled=false;
        passwordSign.disabled=false;
        otp.disabled=false;
        passChange.disabled=false;
       
        // this function is made to send requests to the backend of forgot password
        sendForgotPassDetails(randNo)
    }
    function sendForgotPassDetails(){
        

        // instantiate XHR
        var xhttp= new XMLHttpRequest(randNo);
        xhttp.onreadystatechange=function(){
            if(this.readyState===4 && this.status===200){
                console.log(this.responseText);
                console.log("email value",emails.value)
            }
        }
        xhttp.open("POST","forgot.php",true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
        xhttp.send("otp="+randNo+"&email="+emails.value);

    }
    function checkOtp(e){
        var otpGenerated=randNo;
        var inputOtp=parseInt(e.target.value);
        if(inputOtp!==otpGenerated){
            alert("The otp does not match");
            window.location.href="forgotPass.php"
        }
    }
    function passwordChange(){
        var otpGenerated=randNo;
        var inputOtp=otp.value;
        console.log(inputOtp,otpGenerated);
        console.log(passwordSign.value,emails.value)
        if(passwordRe.value !== passwordSign.value){
            alert("Passwords do not match");
            window.location.href="forgotPass.php";
        }else{
            // instantiate XHR
        var xhttp= new XMLHttpRequest(randNo);
        xhttp.onreadystatechange=function(){
            if(this.readyState===4 && this.status===200){
                console.log(this.responseText);
                console.log("email value",emails.value)
            }
        }
        xhttp.open("POST","changePass.php",true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded")
        xhttp.send("password="+passwordSign.value+"&email="+emails.value);
        }
    }


</script>
</html>