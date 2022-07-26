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
            <?php if($item->mine): ?>
            <div class="feed-item-head-btn">
                <img src="<?=$base;?>/assets/images/more.png" />
                <div class="feed-item-more-window">
                    <a href="<?=$base;?>/excluir_post_action.php?id=<?php echo $item->id;?>">Excluir Post</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="feed-item-body mt-10 m-width-20">
            <?php  $actionPhrase = '';
                switch($item->type){
                    case 'text';
                        echo nl2br($item->body);
                    break;
                    case 'photo';
                        echo '<img src="'.$base.'/media/uploads/'.$item->body.'"/>';
                    break;
                }
            ?>
        </div>
        <div class="feed-item-buttons row mt-20 m-width-20">
            <div class="like-btn <?php echo $item->liked?'on':'';?>"><?php echo $item->likeCount;?></div>
            <div class="msg-btn"><?php echo count($item->comments);?></div>
        </div>
        <div class="feed-item-comments">
            <div class="feed-item-comments-area">
                <?php foreach($item->comments as $comment): ?>
                <div class="fic-item row m-height-10 m-width-20">
                    <div class="fic-item-photo">
                        <a href="<?php echo $base;?>/perfil.php?id=<?php echo $comment->id_user;?>"><img src="<?php echo $base;?>/media/avatars/<?php echo $comment->user->avatar;?>" /></a>
                    </div>
                    <div class="fic-item-info">
                        <a href="<?php echo $base;?>/perfil.php?id=<?php echo $comment->id_user;?>"><?php echo $comment->user->name;?></a>
                        <?php echo $comment->user->name;?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="fic-answer row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href="<?=$base;?>/perfil.php"><img src="<?=$base;?>/media/avatars/<?=$userInfo->avatar;?>" /></a>
                </div>
                <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
            </div>

        </div>
    </div>
</div>