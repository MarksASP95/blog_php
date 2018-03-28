<?php 
        
        
        session_start();
        $title = $_POST['title'];
        $content = $_POST['content'];
        $tags = $_POST['tags'];
    
        $db = new mysqli("localhost","root","","blog");
    
        $stmt = $db -> prepare("INSERT INTO post (post_title,post_cont,tags,post_date) VALUES (?,?,?,CURRENT_DATE)");
    
        $stmt->bind_param('sss',$title,$content,$tags);
    
        $stmt->execute();

        echo "Success";



    

?>