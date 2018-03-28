<?php 

require("db_user.php");
require("bbc_parser/nbbc.php");

$bb = new BBCode();

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

    <style>
        .bbcode_code_body{
            font-family:'Consolas';
            background-color: #282b2e;
            border-left: 4px solid red;
            overflow:auto;
            color: #ffffff;
            padding-left: 5px;
        }
    </style>

    <header>
        <h1><a href="index.php">Marco Suárez</a></h1>
    </header>

    <section id="post">

        <h2 class="post-title"><?php echo $title; ?></h2>
        <p id="post-content"><?php error_reporting(0); echo $bb->Parse(strip_tags($content)); ?></p>

    </section>

</body>
</html>