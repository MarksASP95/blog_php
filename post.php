<?php 

require("db.php");

$title = $_GET['title'];
$post_query = "SELECT post_cont FROM post WHERE post_id = " .  $_GET['id'];
$result = $db->query($post_query);

if($row = $result->fetch_assoc()){
    $content = $row['post_cont'];
}
else{
    header('404.php');
}



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

    <section id="post">

        <h2 class="post-title"><?php echo $title ?></h2>
        <p id="post-content"><?php echo $content ?></p>

    
    </section>

    <aside>

    </aside>




    
</body>
</html>