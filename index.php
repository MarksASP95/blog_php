<?php 
    require("db_user.php");
    $select_posts_query = "SELECT * FROM post ORDER BY post_id DESC";
    $result = $db->query($select_posts_query);
    $posts_list = "";
    
    while($row = $result -> fetch_assoc()){
        $tags = str_replace(" ", "", $row['tags']);
        $tags = explode(",",$tags);
        $tag_list = "";
        foreach($tags as $tag){
            $tag_list .= "#" . $tag . " ";
        }
        $posts_list .= "
        
        <div class=\"post\">

            <a href=\"post.php?id=". $row['post_id'] . "&title=" . $row['post_title'] . "\" class=\"post-title\">" . $row['post_title'] . "</a>
            <p class=\"post-tags\">Tags: " . $tag_list . "</p>
            <p class=\"post-date\">" . $row['post_date'] . "</p>
    
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
        <h1><a href="index.php">Marco Suárez</a></h1>
    </header>

    <section id="page-content">

        <section  id="posts">

            <h2 class="page-subtitle">New Posts</h2>

            <?php echo $posts_list ?>
        
        </section>

        <aside>
            <h2 class="page-subtitle">Search posts...</h2>
            <form action="search_posts.php">
                <input type="text" name="post_name" placeholder="Post name or tags...">
                <input type="submit" value="Search">
            </form>
        </aside>
        
    </section>
    
</body>
</html>