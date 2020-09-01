<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
<!-- outra forma de fazer echo -->
        <title><?=$posts[0]["title"]?></title>  
    </head>
    <body>
        <main>
            <h1><?php echo $posts[0]["title"]; ?></h1>
<?php
    foreach($posts as $post) {
        echo '
        <div class="post">
        <div class="username">'.$post["username"].'</div>
        <div class="post_date">'.date("j M Y H:i", strtotime($post["post_date"])).' </div>
        <div class="message">'.$post["message"].'</div>
        </div>
        ';
    }
?>   

    <nav>
        <a href="?controller=post&action=reply&parent_id=<?=$posts[0]["post_id"]?>">Responder</a>
        <a href="./">Voltar</a>
    </nav>
        </main>
    </body>
</html>