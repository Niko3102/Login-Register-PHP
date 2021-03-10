<?php
require './include/default.php';
try {
    if($auth->logout()){
        header("location:index.php");
        exit;
    }
} catch(Exception $e){
    echo $e->getMessage();
}
?>