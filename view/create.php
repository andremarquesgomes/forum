<!DOCTYPE HTML>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Criar Tópico</title>
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
            <div>
                <label>
                    Titulo
                    <input type="text" name="title" required>
                </label>
            </div>
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
                <button type="submit" name="send">Enviar</button>
            </div>
        </form>
        <nav>
            <a href="./">Voltar</a>
        </nav>
    </body>

</html>



<!-- REQUEST_URI PARA SABER LOCALIZAÇÃO NO SERVIDOR
ver documentação de ivo 
