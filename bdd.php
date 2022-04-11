<?php
$bdd = new PDO("mysql:host=localhost;dbname=margoulab;charset=utf8", "root", "");
$con =  $bdd->query('SELECT * FROM admin_login');
$post = $bdd->query('SELECT * FROM article');
$posts = $bdd->query('SELECT * FROM article ORDER BY date_time DESC');
 
?>
