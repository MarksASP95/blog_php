<?php
    error_reporting(0);
      
    $db = new mysqli("localhost",$_POST['username'],$_POST['password'],"blog");
    if($db->connect_errno){
        echo "Error";
    }
    else{
        session_start();
        $_SESSION['username'] = $_POST['username']; 
    }
?>