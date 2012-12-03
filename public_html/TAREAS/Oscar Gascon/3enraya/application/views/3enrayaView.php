<!doctype html>
<html>
    <head>
        <title>3 en raya</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <style>
            body {
                text-align: center;
            }
            table {
                margin: auto;
                width: 60%;

            }
            td {
                text-align: center;
                font-size: 2em;
                border: 1px solid black;
                height: 5em;
                width: 2em;
            }
        </style>
    </head>
    <body>
        <?php dibujaTablero($table); ?>
        <?= $msg; ?>
        <form action="3enraya.php" method="post" name="form">
            <input type="hidden" value="<?= urlencode(serialize($table)) ?>" name="table" />
            X (0-2): <input type="text" name="x" maxlength="1" size="1" /> 
            Y (0-2): <input type="text" name="y" maxlength="1" size="1" />
            <input type="submit" />
        </form>
        <p><a href="3enraya.php">Empezar de nuevo!</a></p>
    </body>
</html> 