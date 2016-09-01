<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT']; 
//echo $_SESSION['browser'];
$_SESSION['ipaddress']=$_SERVER['REMOTE_ADDR'];
