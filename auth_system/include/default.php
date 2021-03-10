<?php
ini_set("display_errors",1);
error_reporting();
session_start();
require './include/db.php';
require './include/AuthSys.php';
$auth = new AsthSys($PDO);
if($auth->utenteLoggato()){
    echo "Sei loggato - <a href='logout.php'>logout</a>";
}
?>