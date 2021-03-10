<?php
require './include/default.php';
if($_POST){
    try {
        if($auth->login($_POST['username'], $_POST['password'])) {
            header("location:profilo.php");
            exit;
        }
        
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/stile.css">
        <title></title>
    </head>
    <body>
        <p><b>Siamo in</b>&raquo: login.php</p>
        <a type="button" class="btn btn-info" href="index.php">Home</a>
        <a type="button" class="btn btn-info" href="registrati.php">Registrati</a>
        <a type="button" class="btn btn-info" href="login.php">Login</a>
        <hr>

        <form class="" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Inserisci Username *">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Inserisci Password *">
            </div>
            <div class="form-group">
                <input type="submit" value="Effettua il login" class="btn btn-info">
            </div>
        </form>

    </body>

</html>