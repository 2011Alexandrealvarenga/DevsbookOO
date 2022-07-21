
<?php 
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'configuracoes';

$userDao = new UserDaoMysql($pdo);

require 'partials/header.php';
require 'partials/menu.php';
?>

<section class="feed mt-10">
    <h1>Configurações</h1>
    <?php if(!empty($_SESSION['flash'])):?>
        <?php echo $_SESSION['flash']; ?>
    <?php endif;?>
    <form method="POST"  class="config-form" enctype="multipart/form-data" action="<?php echo $base;?>/configuracoes_action.php">
        <label>
            Novo Avatar: <br>
            <input type="file" name="avatar"><br>
            <img class="mini" src="<?=$base;?>/media/avatars/<?=$userInfo->avatar;?>">
        </label>
        <label>
            Nova Capa: <br>
            <input type="file" name="cover"><br>
            <img class="mini" src="<?=$base;?>/media/covers/<?=$userInfo->cover;?>">
        </label>
        <label>
            Nome Completo: <br>
            <input type="text" name="name"  value="<?=$userInfo->name;?>"><br>
        </label>
        <label>
            Email: <br>
            <input type="email" name="email"  value="<?=$userInfo->email;?>"><br>
        </label>
        <label>
            Data de nascimento: <br>
            <input type="text" name="birthdate" value="<?=date('d/m/Y', strtotime($userInfo->birthdate));?>" id="birthdate"><br>
        </label>
        <label>
            Cidade: <br>
            <input type="text" name="city" value="<?=$userInfo->city;?>"><br>
        </label>
        <label>
            Trabalho: <br>
            <input type="text" name="work" value="<?=$userInfo->work;?>"><br>
        </label>
        <label>
            Nova senha: <br>
            <input type="password" name="password"><br>
        </label>
        <label>
            Confirmar nova senha: <br>
            <input type="password" name="password_confirmation"><br>
        </label>
        <button class="button">Salvar</button>
    </form>
</section> 
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById("birthdate"),
        {
            mask: '00/00/0000'
        }
    );
</script>

<?php 
require 'partials/footer.php';