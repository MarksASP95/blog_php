<?php       
    $db = new mysqli("localhost",$_POST['username'],$_POST['password'],"blog");
    if($db->connect_errno){
        echo "Error";
    }
    else{
        echo "Connected";
    }
?>