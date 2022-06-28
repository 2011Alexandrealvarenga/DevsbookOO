<?php 
require 'config.php';
require 'models/Auth.php';

$email = filter_input(INPUT_POST, 'email');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');

if($name && $email && $password && $birthdate){
    $auth = new Auth($pdo, $base);

    $birthdate = explode('/', $birthdate);
    if(count($birthdate) !=3){
        $_SESSION['flash'] = 'Data de nascimento invalida';
        header('location: '.$base.'/signup.php');
        exit;
    }

    $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
    if(strtotime($birthdate) === false){
        $_SESSION['flash'] = 'Data de nascimento invalida';
        header('location: '.$base.'/signup.php');
        exit;
    }
    
    if($auth->emailExists($email) === false){
        
    }else{
        $_SESSION['flash'] = 'Email ja cadastrado';
        header ('location: '.$base.'/signup.php');
        exit;        
    }

}
$_SESSION['flash'] = 'Campos não enviados';
header ('location: '.$base.'/signup.php');
exit;
