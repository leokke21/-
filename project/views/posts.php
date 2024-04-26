<?php
    if(isset($_COOKIE['game'])){
        unset($_COOKIE['game']);
    }
    setcookie('game', $game);
//    print_r ($_COOKIE);
?>
<main>
    <?php
       foreach ($data as $post) { ?>
       <a href="/post/<?=$game?>/<?= $post['id']?>/" class='post-link'>
            <div class="post-card">
                <p><img src="\project\webroot\img\posts\<?=$game?>\<?= $post['image'] ?>" alt="ris" ></p>
                
                <div class="post-text">
                    <div class="post-block">
                        <h3><?= $post['header']?></h3>
                    <p class='post-message'><?= mb_substr($post['text'],0, 300) ?>...</p>
                        
                    </div>
                    

                    <div class="post-date-block">
                    <p class='post-date'><?= $post['data'] ?></p>

                </div>
                </div>
                
            </div>
        </a>
    <?php    
        }
    ?>
</main>