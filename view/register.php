<!DOCTYPE HTML>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <main>
            <h1>Criar Conta</h1>

<?php 
    if(isset($success) && !$success) {
        echo '<p>Erro: Preencha os campos correctamente</p>';
    }

?>
            <form method="post" action="<?=$_SERVER["REQUEST_URI"]?>">
                <div>
                    <label>
                        Username
                        <input type="text" name="username" required maxlenght="32">
                    </label>
                </div>
                <div>
                    <label>
                        Email
                        <input type="email" name="email" required>
                    </label>
                </div>
                <div>
                    <label>
                        Password
                        <input type="password" name="password" required minlenght="6" maxlenght="1000">
                    </label>
                </div>
                <div>
                    <label>
                        Repetir Password
                        <input type="password" name="rep_password" required minlenght="6" maxlenght="1000">
                    </label>
                </div>
                <div>
                    <button type="submit" name="send">Registar</button>
                </div>
            </form>
        </main>

    </body>
</html>