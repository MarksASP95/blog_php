<?php
    error_reporting(0);     
    $db = new mysqli("localhost",$_POST['username'],$_POST['password'],"blog");
    if($db->connect_errno){
        echo (String) "Error";
    }
    else{
        echo (String) "Success";
    }
?>