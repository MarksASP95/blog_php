<?php 
    require("db.php");
    $select_posts_query = "SELECT * FROM post";
    $result = $db->query($selectPostsQuery);
    $posts_list = "";
    
    while($row = $result -> fetch_assoc()){
        $posts_list .= "
        
        <div class=\"post\">

            <h2 class=\"post-title\"></h2>
            <p class=\"post-content\"></p>
            <p class=\"post-date\"></p>
    
        </div>
        
        "; //END APPEND POST VIEW
    } //END WHILE THROUGH RESULT



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Marco's Blog</title>
</head>
<body>

    <header>
        <h1>Marco's Blog</h1>
    </header>

    <section id="posts">

        <?php echo $posts_list ?>
    
    </section>

    <aside>

    </aside>




    
</body>
</html>