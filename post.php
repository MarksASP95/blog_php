<?php 

require("db_user.php");

$title = $_GET['title'];

$stmt = $db->prepare("SELECT post_cont FROM post WHERE post_id = ?");
$stmt->bind_param("i",$_GET['id']);
$stmt->execute();
$result = $stmt->get_result();

try{
    if(!$row = $result->fetch_assoc()){
        throw new Exception('No se ha encontrado el post');
    }
    else{
        $content = nl2br($row['post_cont']);
    }
}
catch(Exception $e){
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
        <h1><a href="index.php">Marco's Blog</a></h1>
    </header>

    <section id="post">

        <h2 class="post-title"><?php echo $title ?></h2>
        <p id="post-content"><?php echo $content ?></p>

    
    </section>

    <aside>

    </aside>




    
</body>
</html>