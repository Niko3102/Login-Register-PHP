<?php
require './include/default.php';
if(!$auth->utenteLoggato()){
    header("location: index.php");
    exit;
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
        <p><b>Siamo in</b>&raquo: profilo.php</p>
        <a type="button" class="btn btn-info" href="registrati.php">Registrati</a>
        <a type="button" class="btn btn-info" href="login.php">Login</a>
        <hr>
    </body>

</html>