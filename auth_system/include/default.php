<?php
ini_set("display_errors",1);
error_reporting();

session_start();
require './include/db.php';
require './include/AuthSys.php';
require './lib/PHPMailer-master/src/POP3.php';
require './lib/PHPMailer-master/src/SMTP.php';
require './lib/PHPMailer-master/src/PHPMailer.php';
$mail = new PHPMailer\PHPMailer\PHPMailer();
$auth = new AsthSys($PDO, $mail);
if($auth->utenteLoggato()){
    echo "Sei loggato - <a href='logout.php'>logout</a>";
}
?>