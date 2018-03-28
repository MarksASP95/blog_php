<?php 
    require("db_user.php");
    $stmt = $db->prepare("SELECT * FROM post WHERE post_title LIKE ? OR tags LIKE ? ORDER BY post_id DESC");
    $param = "%" . $_GET['post_name'] . "%";
    $stmt->bind_param("ss", $param,$param);
    $stmt->execute();
    $result = $stmt->get_result();
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

            <h2 class="page-subtitle">Search results</h2>

            <?php if(!$posts_list == ""){echo $posts_list;}else{echo "<h3>No posts found</h3>";} ?>
        
        </section>

        <aside>
            <h2 class="page-subtitle">Search posts...</h2>
            <form action="search_post.php">
                <input type="text" name="post_name" placeholder="Post name or tags..." required>
                <input type="submit" value="Search">
            </form>
        </aside>
        
    </section>
    
</body>
</html>