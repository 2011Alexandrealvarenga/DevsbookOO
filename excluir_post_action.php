<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$id = filter_input(INPUT_POST, 'id');

if($id){
    $postDao = new PostDaoMysql($pdo);

    // excluir o post do usuario que criou
    $postDao->delete($id, $userInfo->id);


}
header("location: ".$base);
exit;