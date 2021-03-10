<?php
require './include/default.php';
if($_POST) {
    try{
        $auth->registraNuovoUtente($_POST);
    }catch(Exception $e){
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
        <p><b>Siamo in</b>&raquo: registrati.php</p>
        <a type="button" class="btn btn-info" href="index.php">Home</a>
        <a type="button" class="btn btn-info" href="registrati.php">Registrati</a>
        <a type="button" class="btn btn-info" href="login.php">Login</a>
        <hr>

        <form class="" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <input type="text" class="from-control" name="uname" placeholder="Username *">
            </div>
            <div class="form-group">
                <input type="password" class="from-control" name="pwd" placeholder="Password *">
            </div>
            <div class="form-group">
                <input type="password" class="from-control" name="re_pwd" placeholder="RePassword *">
            </div>
            <div class="form-group">
                <input type="text" class="from-control" name="nome" placeholder="Nome *">
            </div>
            <div class="form-group">
                <input type="email" class="from-control" name="email" placeholder="Email *">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Invia">
            </div>
    </body>

</html>