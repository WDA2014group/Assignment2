<?php


$pdo=new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USER,DB_PW);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
