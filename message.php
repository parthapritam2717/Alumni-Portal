<?php
require 'header.php';

if($_SESSION['login']==1 && $_SESSION['right']=="registered"){
    
    
        
      echo"You have not yet verified your email!";  
        
    }
    
    

?>