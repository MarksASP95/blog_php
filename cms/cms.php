<?php 
    $form = '';
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: ../404.php');
        echo 'error';
    }
    else{
        $form = '
        <h2>Create post</h2>

        <form name="new-post" id="new_post_form">

            <table>
                <tr>
                    <td>Title:</td>
                    <td><input name="title" type="text"></td>
                </tr>
                <tr>
                    <td>Content:</td>
                    <td><textarea name="content" form="new-post"></textarea></td>
                </tr>
                <tr>
                    <td>Tags:</td>
                    <td><input type="text" name="tags"></td>
                </tr>
            </table>

            <input type="submit" value="Post">

        </form>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Marco's Blog</title>
</head>
<body>

    <header>
        <h1><a>Marco's Blog</a></h1>
    </header>

    <style>
        h2{
            text-align: center;
            margin-top:40px;
            font-size: 2em;
        }

        form{
            width:60%;
            top:550px;
            
        }

        form table{
            width: 80%;
        }
        
        form table td{
            padding-bottom:20px;
        }

        form table td:first-child{
            font-size: 1.5em;
            vertical-align: top;
        }

        input[type='text']{
            width: 100%;
            margin:0;
            height: 40px;
            font-size: 1.5em;
        }

        input[type='submit']{
            margin: 0 auto;

        }

        textarea{
            width: 100%;
            border:1px solid black;
            height: 400px;
            resize:none;
            font-size: 1.1em;
        }
    
    </style>

        <?php 
        
            echo $form;
            session_destroy();

        ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="js/new_post.js"></script>
    
</body>
</html>