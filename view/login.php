<!DOCTYPE HTML>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <main>
            <h1>Efectuar Login</h1>
            <form method="post" action="<?=$_SERVER["REQUEST_URI"]?>">
                <div>
                    <label>
                        Username
                        <input type="text" name="username" required maxlenght="32">
                    </label>
                </div>
            
                <div>
                    <label>
                        Password
                        <input type="password" name="password" required minlenght="6" maxlenght="1000">
                    </label>
                </div>
                <div>
                    <button type="submit" name="send">Aceder</button>
                </div>
            </form>
        </main>

    </body>
</html>