<?php
require './include/default.php';
if(!isset($_GET['id']) || !isset($_GET['token'])) {
    header("location: index.php");
    exit;
}
$ris = $auth->confermaRegistrazione($_GET['id'], $_GET['token']);

if($ris === FALSE){
    header("location: index.php");
    exit;
}

echo "Conferma registrazione avvenuta. Effetua il <a href='login.php'>login</a>";
?>