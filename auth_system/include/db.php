<?php
$dns = "mysql:host=localhost;dbname=auth_system;charset=utf8";
try {
    $PDO = new PDO($dns, "root", "");
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Errore connessione al database!";
}
?>