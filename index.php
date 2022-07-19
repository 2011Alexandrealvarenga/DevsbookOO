<?php 
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

require 'partials/header.php';
require 'partials/menu.php';
?>

<section class="feed mt-10">
... conteudos
</section> 

<?php 
require 'partials/footer.php';