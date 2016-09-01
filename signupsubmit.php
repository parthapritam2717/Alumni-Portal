<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'header.php';
if(strcmp($_SESSION['signupstatus'],"success")==0){
    
    ?>

<script>
alert("You Have successfully Registered . Kindly verify your email by clicking the link in your confirmation email.");
window.location="index.php";


</script>



<?php	
    
    
}
else{
    
    ?>

    <script>
alert("There has been some error!!");
window.location="signup.php";


</script>
    
    <?php
    
}