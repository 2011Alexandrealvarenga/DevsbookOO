<?php 

$base = "http://localhost:8080/PHP/cursos/b7web/DevsbookOO";

$db_name = "devsbook";
$db_host='localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host",$db_user,$db_pass);
