<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Tuga Forum</title>
    </head>
    <body>
       <ul>
<?php
    foreach($posts as $post) {
        echo '
        <li>
            <a href="index.php?controller=post&post_id='.$post["post_id"].'">'.$post["title"].'</a>
        </li>
        ';

    }

?>
            
       </ul> 
       <nav>
<?php
    if(isset($_SESSION["user_id"])) {

        ?>
            <a href="?controller=post&action=create">Criar Tópico</a>
            <a href="?controller=access&action=logout">Logout</a>
<?php
    }
    else{

        ?>
            <a href="?controller=access&action=login">Login</a>
            <a href="?controller=access&action=register">Criar conta</a>
<?php
    }
?>
       </nav>
    </body>
</html>