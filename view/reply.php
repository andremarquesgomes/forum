<!DOCTYPE HTML>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Responder a <?=$post["title"]?></title>
    </head>
    <body>
        <h1>Responder a "<?=$post["title"]?>"</h1>
        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
       
            <div>
                <label>
                    Mensagem
                    <textarea name="message" required> </textarea>
                </label>
            </div>
            <div>
                <label>
                    Utilizador
                    <input type="text" name="username" required>
                </label>
            </div>
            <div>
                <input type="hidden" name="parent_id" value="<?=$post["post_id"]?>">
                <button type="submit" name="send">Enviar</button>
            </div>
        </form>
        <nav>
            <a href="?controller=post&post_id=<?=$post["post_id"]?>">Voltar</a>
        </nav>
    </body>

</html>




