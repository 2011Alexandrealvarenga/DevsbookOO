<?php 
require 'config.php';
require 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');


if($name && $email && $password && $password){
    $auth = new Auth($pdo, $base);
}   
    
$_SESSION['flash'] = "Campos nao enviados";
header("location: ".$base."/login.php");
exit;
