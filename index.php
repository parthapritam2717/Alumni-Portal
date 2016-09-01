<?php
require 'header.php';
$passErr1 = $emailErr =$email=$password=$pass1= "";
//$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["email"])) {
                    $emailErr = "*Email is required";
                  } 
                  else {
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

                                    $passErr1 = "*Invalid Password!";
                                }
                                else{
                                    $pass1 = $_POST['password1'];
                                }
                                
                                
                                 $password= sha1($pass1);
                                 
                                 
                 }
                 
                 
                 
                  require("connect.php");
                  if($email!=NULL || $email!="" || $password!=NULL || $password!=""){
					  
					  	$query = mysqli_query("SELECT * FROM admin WHERE `name` = $email AND `pass` = $password");
						if(mysql_num_rows($query)>0){
							header('lcoation:admin.php');
						}
						else{
                        $query= "SELECT * FROM user ";}
                        $result=mysqli_query($con,$query);
        					if($result){
                                                     while($row = mysqli_fetch_array($result)) {  
$_SESSION['right']=$row['rights'];
 if((strcmp($row['email'],$email)==0)) {
     $emailErr="";
            if(strcmp($row['password'],$password)==0){
				$_SESSION['login']=1;$passErr1="";
				if(strcmp($_SESSION['right'],"registered")==0){
					
					header("location:message.php");
	
				}
				else{
				   // $passErr1="";
					header("location:home.php");
				}


            //echo $row['email'];	
               }
        else{
            $passErr1="Password is wrong!";
            
        }
        
        
        
 }
        //echo $_SESSION['loggedin'];
        //echo $email;	
        else{
                $emailErr="User not found!";
          //  $_SESSION['usernotfound']==1;
            //header("message.php");

        }



}
}

                    
                    
                 
                 
                 
                  }    
                 

}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?><!DOCTYPE html>
<html>

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
  display: table;
  text-align: center;
  font-family: 'Open Sans', sans-serif;
  background: #81b5d6;
  max-width: 33em;
}
.wrap {
  margin-top:50px;
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
input[type=text],
input[type=password] {
  color:#FFF;
  background: #68add8; /* Old browsers */
  background: linear-gradient(45deg,  #68add8 0%,#8cbede 100%); /* W3C */
  width:250px;
  height:40px;
  margin: 0 auto 10px auto;
  font-size:14px;
  padding-left:15px;
  border:none;
  box-shadow: -3px 3px #679acb ;
  -webkit-appearance:none;
  border-radius:7px;
  border-top: 1px solid #92c5e2;
  border-right: 1px solid #92c5e2;
}
input::-webkit-input-placeholder { 
  color: #FFF;
}
input:focus {
  outline:none;
}
input[type=submit] {
    color: #fff;
    background-color:#3f88b8;
    font-size: 14px;
    height: 40px;
    border: none;
    margin: 0 auto 0 17px;
    padding: 0 20px 0 20px;
    -webkit-appearance:none;
    border-radius:10px;
    cursor: pointer;
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
    width:400px;
    text-align:left;
    height:20px;
   color:#fff;
}

</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body >

  

    <div class="wrap" id="wrap1" style="width:98%">

  <div class="flip-container" id='flippr'>
    <div class="flipper">
      <div class="front"></div>
      <div class="back"></div>
    </div>
  </div>

  <h1 class="text" id="welcome">Welcome to the Bhilai Institute Of Technology Alumni Portal <br><span>please login or register!</span></h1>
<br>
<br><div id="left" style="margin-left:-80%">
  <form method='post' name="loginform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
      <input type='text' id="emailid" name='email'value="<?php echo $email;?>" placeholder='Email'><br><label id="emailerrormessage"><?php echo $emailErr;?></label><br>
      <input type='password' id='password' name='password1' placeholder='Password'><br><label id="passworderrormessage"><?php echo $passErr1;?></label>

    <div class='login'>
     <!-- <a href="#"><i class="icon-cog"></i> Register a new account! </a>-->
      <a href="#"><i class="icon-cog"></i> Forgot Password! </a>     
      <input type='submit' value='Login'>

    </div><!-- /login -->
  </form>
  </div>
  
  
  <div id="right"style="margin-top:-21%; float:right; margin-left:0; font-size:20px; position:relative">
  <span style="color:#fff">
		OR  
  
  </span>&nbsp&nbsp&nbsp
  
  <a href="signup.php" style="font-size:20px" id="registerlink"><i class="icon-cog"></i>&nbsp Register a new account! </a>
  
  
  </div>
  </div>
</div><!-- /wrap -->






</div>


  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>
<?php
//echo $_SESSION['ipaddress'];

?>
</body>
<script>
    var emailstatus=0; var passwordstatus1=0; 
    function validateForm(event){
            //name validation
                    
                
                
                //email validation
                
                   x = document.loginform.email.value;
                    // len=emailID.length;
                   //alert(x);
                   //var x = document.forms["myForm"]["email"].value;
                   if(x=== null || x===""){
                       //alert("hello");
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
                   pass1= document.loginform.password1.value;
                   len1=pass1.length;
                 //  alert(pass1);
                   if(pass1 === null || pass1===""){
                       
                       //alert("hi");
                         document.getElementById('passworderrormessage').innerHTML=" **Please enter your Password! :(";
                       passwordstatus1=0;
                       return false;
                   }
                   if(len1<8){
                       document.getElementById('passworderrormessage').innerHTML=" ** Minimum Password length is 8 characters ! :(";
                       passwordstatus1=0;
                       return false;
                   }
                   else{
                       passwordstatus1=1;
                       
                   }
                 
                 
                 //password2 validation
                 
                     if( emailstatus===1 && passwordstatus1===1 ){
                       
                       return true;
                   }
                   }
	
</script>
</html>
