<?php
require 'header.php';
$passErr1 = $emailErr = $passErr2 = $nameerr=$name=$email= "";
//$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["nameuser"])) {
                  $nameerr = "*Name is required";
                } else {
                  $name = test_input($_POST["nameuser"]);
                  // check if name only contains letters and whitespace
                  if (!preg_match("/^[a-zA-Z. ]*$/",$name)) {
                    $nameerr = "*Only letters  dot and white space is allowed"; 
                  }
                }
                
                 if (empty($_POST["email"])) {
                    $emailErr = "*Email is required";
                  } else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $emailErr = "*Invalid email format"; 
                    }
                  }
                  
                 if (empty($_POST["password1"])) {
                    $passErr1 = "*Password is required";
                    
                 }
                 else{// count number of characters in password1
                                if(strlen($_POST['password1'])<8){

                                    $passErr1 = "*Password should be more than 8 characters!";
                                }
                                else{
                                    $pass1 = $_POST['password1'];
                                }

                                if (empty($_POST["password2"])) {
                               $passErr2= "*Confirm your Password";                              
                                }
                        else{
                                if(strlen($_POST['password2'])<8){

                                    $passErr2 = "*Password should be more than 8 characters!";
                                }
                            $pass2=$_POST['password2'];
                            if(strcmp($pass1, $pass2) !== 0)
                                    
                            {
                                $passErr2 = "*Password should match!";
                            }
                            else{
                                
                                $password=  sha1($pass1);
                            }
                        }
                 
                 
                 }
                  
                 // logic for entering the data into data base
                 $type="registered";
                 require("connect.php");
                    $query= "Insert into user(name,password,email,rights) values('$name', '$password','$email','$type')";
                    $result=mysqli_query($con, $query);
                    if($result){
                        $_SESSION['signupstatus']="success";
                        header('location:signupsubmit.php');
                    }
                    else{
                        $_SESSION['signupstatus']="failed";
                        header('location:signupsubmit.php');
                        
                    }
                    
                    
                    
                     
                 
                 
                 
                 
                 
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

    <!DOCTYPE html>
<html>
    <noscript >
    <h4 style="color: #fff"> please activate javascript in your browser for a better experience!</h4>
    
    </noscript>
    
<head>

  <meta charset="UTF-8">

  <title>BIT  Alumni Portal</title>

  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600,700,300'>

    <style>
html,
body {
  width: 100%;
  height: 100%;
}
body {
  margin: 0 auto;
  display: block;
  text-align: center;
  font-family: 'Open Sans', sans-serif;
  background: #81b5d6;
  max-width:890px;
  max-height:500px
}
.wrap {
  margin-top:10px;
}

.flip-container {
  perspective: 1000;
  border-radius: 50%;
  margin: 0 auto 10px auto;
}

.logged-in {
	transform: rotateY(180deg);
}

.flip-container, .front, .back, .back-logo {
	width: 130px;
	height: 130px;
}

.flipper {
	transition-duration: 0.6s;
	transform-style: preserve-3d;
}

.front, 
.back {
	backface-visibility: hidden;
	position: absolute;
	top: 0;
	left: 0;
  background-size: cover;
}

.front {
	background: url(http://s8.postimg.org/y7z5wso29/Flip_Img.png) 0 0 no-repeat;
}

.back {
	transform: rotateY(180deg);
	background: url(http://s8.postimg.org/u04do1mmp/Flip_Img2.png) 0 0 no-repeat;
}

h1 {
  font-size: 22px;
  color: #FFF;
}
h1 span {
  font-weight: 300;
}
input[type=email],input[type=text],
input[type=password] {
  color:#FFF;
  background: #68add8; /* Old browsers */
  background: linear-gradient(45deg,  #68add8 0%,#8cbede 100%); /* W3C */
  width:400px;
  height:40px;
  margin: 0px 0px 10px 0px;
  font-size:14px;
  padding-left:15px;
  border:none;
  box-shadow: -3px 3px #679acb ;
  -webkit-appearance:none;
  border-radius:7px;
  border-top: 1px solid #92c5e2;
  border-right: 1px solid #92c5e2;
  
  float:left ;
  clear:left;
  
}
input::-webkit-input-placeholder { 
  color: #FFF;
}
input:focus {
  outline:none;
}
input[type=submit],input[type=reset] {
    color: #fff;
    background-color:#3f88b8;
    font-size: 14px;
    height: 40px;
    width: 90px;
    border: none;
    margin: 0 auto 0 17px;
    padding: 0 20px 0 20px;
    -webkit-appearance:none;
    border-radius:10px;
    cursor: pointer;float:left ;
  clear:left;
}input[type=reset]:hover {
  background-color:#3f7ba2;
}

input[type=submit]:hover {
  background-color:#3f7ba2;
}
a {
  color:#1c70a7;
  font-weight:600;
  font-size:12px;
  text-decoration:none;
}
a:hover {
  color:#3f7ba2;
}

.hint
{
  width:250px;
  dislay:block;
  margin:80px auto 0 auto;
  text-align:left;
}

.hint p
{
  padding: 5px 0 5px 0;
  color:#FFF;
  font-weight:600;
  font-size:20px;
}

.hint p span
{
  font-weight:300;
  font-size:16px;
}
label{
    width:390px; height:14px; font-size:16px;
    float:left ;padding-left: 0px;
    padding-top: 13px;margin-left:1%;
    text-align: left;
  
}

</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body >

  <div class="flip-container" id='flippr' style="width:90%; margin-top:9%">
    <h1 class="text" id="welcome">Welcome to the Bhilai Institute Of Technology Alumni Portal <br><span>please Enter your registration details!</span></h1>
  </div>

    <div class="wrap" id="wrap1" style="width:100%; display:block; margin-left: 25% ">

        

  
        <br>
        <form method="POST" name="signupform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()" >
            <input type='text' id="nameid" name='nameuser'value="<?php echo $name;?>" autocomplete="false" placeholder='Enter Your Name'onselect="namevalid()" onfocus="namevalid()">&nbsp<label style=" color:#f4f7f7; "id="nameerrormessage"> <?php echo $nameerr;?></label><br>
            <input type='text' id="emailid" name='email' value="<?php echo $email;?>" placeholder='Enter Your Email' onselect="namevalid()" onfocus="namevalid()">&nbsp<label style=" color:#f4f7f7; "id="emailerrormessage"><?php echo $emailErr;?></label><br>
            <input type='password' id='password' name='password1' placeholder='Password'  onselect="emailvalid()" onfocus="emailvalid()"   >&nbsp;<label style=" color:#f4f7f7;"id="passworderrormessage"><?php echo $passErr1;?></label><br>
            <input type='password' id='passwordc' name='password2' placeholder='Confirm your Password'onfocus="passwordvalidation2()" onfocus="passwordvalidation2()">&nbsp;<label style="color:#f4f7f7"id="passworderrormessage1"><?php echo $passErr2;?></label><br>
        <!--<input type='text' id="batch" name='batch' placeholder='Batch Year'>&nbsp;<label style=" color:#f4f7f7;display: none"id="emailerrormessage">Please enter a valid Email!</label><br>
    <select style="width:470px;
  height:40px;
  margin: 0 auto 10px auto;
  font-size:14px;
  padding-left:15px;
  border:none;
  box-shadow: -3px 3px #679acb ;
  -webkit-appearance:none;
  border-radius:0;
  border-top: 1px solid #92c5e2;
  border-right: 1px solid #92c5e2;background: #68add8; /* Old browsers */
  background: linear-gradient(45deg,  #68add8 0%,#8cbede 100%); /* W3C */; color:#000" > <option></option><option value="CSE">CSE</option>
        <option value="MECH">MECH</option>
        <option value="CIVIL">CIVIL</option>
        <option value="IT">IT</option></select>-->

            <div class='login' style=" margin-top:50px ">
     <!-- <a href="#"><i class="icon-cog"></i> Register a new account! </a>-->
                <br><br>
       
        <input type='submit' value='Register' style="margin-left:11%; position: relative">
        <input type="reset" value="Reset" style="margin-left: 25%; margin-top: -4.5%"> 

    </div><!-- /login -->
  </form>
  
  
  
 
</div><!-- /wrap -->






</div>


 

  <script src="js/index.js"></script>

</body>




<!--validation-->
<script>
  //  document.signupform.email.addEventListener("onkeypress",function(){ alert("Hello World!"); });
 //var key=document.getElementById('emailid').value;
 //document.getElementById("emailid").addEventListener("keyup",emailvalidation);
 document.getElementById("nameid").addEventListener("keyup",namevalid);
 document.getElementById("emailid").addEventListener("keyup",emailvalidationfirefox);
 document.getElementById("password").addEventListener("keyup",passwordvalidation1);
 document.getElementById("passwordc").addEventListener("keyup",passwordvalidation2);
    var emailstatus=0; var passwordstatus1=0;  var passwordstatus2=0;namestatus=0;
    // this function makes browser compatibility
    function emailvalidationfirefox(event){
        
         
       //document.getElementById('passworderrormessage').style.display="none";
      // alert("am here!");
       var  x = document.signupform.email.value;
         //alert("am here!");
          
            
          // key= event.keyCode;
         key=event.which;
            //alert(key);
            var atpos = x.indexOf("@");
                    var dotpos = x.lastIndexOf(".");
                    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) 
                       {
                //
                //$emailstatus=" * Something wrong with the email ";
                document.getElementById('emailerrormessage').innerHTML=" * Something wrong with the Email :(";
                document.getElementById('emailerrormessage').style.display="inline";
                //alert("Please enter correct email ID");
               // document.myForm.email.focus() ;
               // return false;
               emailstatus=0;
            } 
            else if ( key === 8){
                   // alert(key);
                   len=emailID.length;
                   if(len===0){
                   document.getElementById('emailerrormessage').style.display="none"; 
                   }
               }
            else
            {
                 document.getElementById('emailerrormessage').innerHTML=" * Email seems fine! :)";
                 document.getElementById('emailerrormessage').style.display="inline";
                emailstatus=1;
                }
                
                  
    
        
        
    }
    
    
    function namevalid(){
        
              name = document.signupform.nameuser.value;
              lenname=name.length;
               if(name===""||name===null ){
                   document.getElementById('nameerrormessage').innerHTML=" * Please enter your Name  :(";
            document.getElementById('nameerrormessage').style.display="inline";
            document.getElementById('nameid').focus();
            
               }
               
               var letters = /^[A-Za-z. ]+$/;  
                if(name.match(letters))  
                {  
                    document.getElementById('nameerrormessage').innerHTML=" * Name seems fine! :)";
                    namestatus=1;
               
                }  
                else  
                {  
                 document.getElementById('nameerrormessage').innerHTML=" * Name should only contain valid characters! :(";
                 document.getElementById('nameid').focus(); 
                 namestatus=0;
                //return false;  
                }  
       
        
    }
    
          
    // email validation when change focus
    function emailvalid(event){
        emailID = document.signupform.email.value;
        // len=emailID.length;
  
        if(emailID===""||emailId===null ){
            
            document.getElementById('passworderrormessage').innerHTML=" * Please enter your Email First :(";
            document.getElementById('passworderrormessage').style.display="inline";
            document.getElementById('emailid').focus();
            return;
        }
        
    }
    
    function passwordvalidation1(event){
        
        
         pass= document.signupform.password1.value;
          key= event.keyCode;

             len=(pass.length) ;
             if(len===0){
                 
                 
                  document.getElementById('passworderrormessage').style.display="none";
                  document.getElementById('passworderrormessage1').style.display="none";
                  passwordstatus1=0;
                 return;
             }
             //alert(len);
                  
    
               if(key===8)
               {
                   len1=pass.length;
                   if(len1>7){
                   document.getElementById('passworderrormessage').innerHTML=" *Password seems secured! :)";
                   document.getElementById('passworderrormessage').style.display="inline";
                   passwordstatus1=1;
                   return;
                    }
                    else if(len1===0){
                        
                        document.getElementById('passworderrormessage').style.display="none";
                        passwordstatus1=0; 
                        
                    }
                    else{
                          document.getElementById('passworderrormessage').innerHTML=" *Password should be greater than 8 characters :(";
                        passwordstatus1=0; 
                    }
               
               
               
                   
               }
                else  if((len>0 && len<8) && ( key !== 8)){
                       document.getElementById('passworderrormessage').innerHTML=" *Password should be greater than 8 characters :(";
                        document.getElementById('passworderrormessage').style.display="inline";
                        passwordstatus1=0; 
                       
                   }
                   else if(len>7){
                       
                       document.getElementById('passworderrormessage').innerHTML=" *Password seems secure  :)";
                        document.getElementById('passworderrormessage').style.display="inline";
                        passwordstatus1=1; 
                   }
    }
    
    function passwordvalidation2(event){
         pass2= document.signupform.password2.value;
          pass1= document.signupform.password1.value;
         // key= event.keyCode;

             len1=(pass1.length) ;
              len2=(pass2.length) ;
            //alert(pass1);
        if( passwordstatus1===0 || (len1===0) ){
            
             document.getElementById('passworderrormessage1').innerHTML=" *Enter a valid Password first! :(";
             document.getElementById('passworderrormessage1').style.display="inline";
            passwordstatus2=0;
             document.getElementById('password').focus();
             return;
           
        }
        else if(len2===0 && passwordstatus1===0 ){
             document.getElementById('passworderrormessage1').style.display="none";
              passwordstatus2=0;
            
            
        }
         else if(len2===0 && passwordstatus1===1){
             //alert(len2);
             document.getElementById('passworderrormessage1').innerHTML=" *Please reenter the password! :)";
             document.getElementById('passworderrormessage1').style.display="inline";
              passwordstatus2=0;
            
        }
        else{
            
            // coding for password match will be here
            
            
            
            if((pass1===pass2)&&(len1>0 && len2>0)){
                document.getElementById('passworderrormessage1').innerHTML=" *Password match! :)";
                passwordstatus2=1;
            }
            else{
                 document.getElementById('passworderrormessage1').innerHTML=" *Password mismatch! :(";   
              passwordstatus2=0;
                
            }
               
        }
    }
     
        
       
        
        // to validate the form on submit
        function validateForm(event){
            //name validation
                    name = document.signupform.nameuser.value;
                    lenname=name.length;
              if(name===""||name===null ){
                   document.getElementById('nameerrormessage').innerHTML=" **Please enter your Name  :(";
                    document.getElementById('nameerrormessage').style.display="inline"; 
                    namestatus=0;
                    return false;
                }
                 var letters = /^[A-Za-z. ]+$/;  
                if(name.match(letters))  
                {  
                    //document.getElementById('nameerrormessage').innerHTML=" * Name seems fine! :)";
                    namestatus=1;
               
                }  
                else  
                {  
                 document.getElementById('nameerrormessage').innerHTML=" **Name should only contain valid characters! :(";
                 document.getElementById('nameid').focus(); 
                 namestatus=0;
                return false;  
                }  
                
                
                
                //email validation
                
                   x = document.signupform.email.value;
                    // len=emailID.length;
                   //var x = document.forms["myForm"]["email"].value;
                   if(x=== null || x===""){
                       document.getElementById('emailerrormessage').innerHTML=" **Please enter your Email  :(";
                       emailstatus=0;
                       return false;
                       
                   }
                    var atpos = x.indexOf("@");
                    var dotpos = x.lastIndexOf(".");
                    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) 
                       {
                        
                        //
                        //$emailstatus=" * Something wrong with the email ";
                        document.getElementById('emailerrormessage').innerHTML=" **Something wrong with the Email  :(";
                        document.getElementById('emailerrormessage').style.display="inline";
                        //alert("Please enter correct email ID");
                       // document.myForm.email.focus() ;
                       // 
                       emailstatus=0;
                       return false;
                       
                    } 
                    else{
                        
                        emailstatus=1;
                    }
                    
                   //password1 validation
                   pass1= document.signupform.password1.value;
                   len1=pass1.length;
                 //  alert(pass1);
                   if(pass1 === null || pass1===""){
                       
                       //alert("hi");
                         document.getElementById('passworderrormessage').innerHTML=" **Please enter your Password! :(";
                       passwordstatus1=0;
                       return false;
                   }
                   if(len1<8){
                       document.getElementById('passworderrormessage').innerHTML=" **Password should be greater than 8 characters :(";
                       passwordstatus1=0;
                       return false;
                   }
                   else{
                       passwordstatus1=1;
                       
                   }
                 
                 
                 //password2 validation
                 
                     pass2= document.signupform.password2.value;
                     len2=pass2.length;
                      if(pass2 === null || pass2===""){
                       
                       //alert("hi");
                         document.getElementById('passworderrormessage1').innerHTML=" **Please re-enter your Password! :(";
                       passwordstatus2=0;
                       return false;
                   }
                   if(pass1!==pass2){
                       
                        document.getElementById('passworderrormessage1').innerHTML=" ** Password is not matched! :(";
                       passwordstatus2=0;
                       return false;
                   }
                   else if((pass1===pass2 )&&(len1>0 && len2>0)&&(len1===len2)){
                        passwordstatus2=1;
                       
                   }
                   
                   // final check
                   if(namestatus===1 && emailstatus===1 && passwordstatus1===1 && passwordstatus2===1){
                       
                       return true;
                   }
                
            
        }
        
    
	
</script>
</html>
