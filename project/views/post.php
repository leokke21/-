<?php
    session_start();
   if(isset($_POST['addcomment'])) {
        if(isset($_POST['sended-comment'])) {
            $today_date = date('Y-m-d');
            $userdata = $user ->getById($_SESSION['userid']);
            $comment->create($data['id'], $userdata['name'],$_POST['sended-comment'], $today_date );
        }
   }
?>
<main>
    <div class="post">
        <img src="\project\webroot\img\posts\<?=$game?>\<?= $data['image'] ?>" alt="ris" >

        <div class="one-post-info">
            <h1><?= $data['header']?></h1>
            <p class=""> <?= $data['data'] ?></p>
        </div>
        <div class="one-post-text">
            <p><?=  $data['text']; ?></p>
        </div>
        
                
                
    </div>
    <div class="commentaries">
        <div class="addcomment">
            <?php if(isset($_SESSION['autorize'])) { ?>
                <form action="" method='post' class="addcomment">
                    <input type="text" name="sended-comment" placeholder="Отправить сообщение" class='comment-input'>
                    <input type="submit" name="addcomment" class="button" value="Отправить">
                </form>
            <?php } else { ?>
            <input type="text" placeholder="Нужно быть зарегестрированным польхователем чтобы оставлять комментарии" disabled class='comment-input'>
            <button onclick="" disabled>Отправить</button>
            <?php } ?>
        </div>
        <hr>
        <?php
           foreach ($comments as $comment) { ?>
                <div class="comment">
                    <div class="user-avatar">
                        <img src="\project\webroot\img\users\<?= $comment['avatar'] ?>" alt="">
                    </div>
                    <hr>
                    <div class="comment-text">
                        <div class="comment-author-date">
                        <h4><?= $comment['author'] ?></h4>
                        <p><?= $comment['data'] ?></p>


                        </div>
                        <p><?= $comment['text'] ?></p>
                        <div class="likes">
                            <button onclick="" class="addlike"></button>
                            
                        </div>
                    </div>

                </div>
           <?php }
        ?>
    </div>
</main>