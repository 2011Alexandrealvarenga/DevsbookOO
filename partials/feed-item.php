<?php 
require_once 'feed-item-script.php';
$actionPhrase = '';
switch($item->type){
    case 'text';
        $actionPhrase = 'Fez um post';
    break;
    case 'photo';
        $actionPhrase = 'Postou uma foto';
    break;
}
?>
<div class="box feed-item" data-id="<?php echo $item->id;?>">
    <div class="box-body">
        <div class="feed-item-head row mt-20 m-width-20">
            <div class="feed-item-head-photo">
                <a href="<?=$base;?>/perfil.php?id=<?php echo $item->user->id;?>"><img src="<?=$base;?>/media/avatars/<?php echo $item->user->avatar;?>" /></a>
            </div>
            <div class="feed-item-head-info">
                <a href="<?=$base;?>/perfil.php?id=<?php echo $item->user->id;?>"><span class="fidi-name"><?php echo $item->user->name;?></span></a>
                <span class="fidi-action"><?php echo $actionPhrase; ?></span>
                <br/>
                <span class="fidi-date"><?php echo date('d/m/Y', strtotime($item->created_at)); ?></span>
            </div>
            <div class="feed-item-head-btn">
                <img src="<?=$base;?>/assets/images/more.png" />
            </div>
        </div>
        <div class="feed-item-body mt-10 m-width-20">
            <?php echo nl2br($item->body);?>
        </div>
        <div class="feed-item-buttons row mt-20 m-width-20">
            <div class="like-btn <?php echo $item->liked?'on':'';?>"><?php echo $item->likeCount;?></div>
            <div class="msg-btn"><?php echo count($item->comments);?></div>
        </div>
        <div class="feed-item-comments">


            <div class="fic-answer row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href="<?=$base;?>/perfil.php"><img src="<?=$base;?>/media/avatars/<?=$userInfo->avatar;?>" /></a>
                </div>
                <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
            </div>

        </div>
    </div>
</div>