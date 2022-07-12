<?php 
require 'config.php';
require 'models/Auth.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');


if($name && $email && $password && $password){
    $auth = new Auth($pdo, $base);

    $birthdate = explode('/',$birthdate);
    if(count($birthdate)!=3){
        $_SESSION['flash'] = "Data de nascimento invalida";
        header("location: ".$base."/login.php");
        exit;
    }

    $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
    if(strtotime($birthdate) === false){
        $_SESSION['flash'] = "Data de nascimento invalida";
        header("location: ".$base."/login.php");
        exit;
    }
    
    // verifica se email existe
    if($auth->emailExists($email) === false){
        $auth->registerUser($name, $email, $password, $birthdate);
        header("location: ".$base);
        exit;

    }else{
        $_SESSION['flash'] = "Email ja cadastrado";
        header("location: ".$base."/login.php");
        exit;
    }

}   
    
$_SESSION['flash'] = "Campos nao enviados";
header("location: ".$base."/login.php");
exit;
