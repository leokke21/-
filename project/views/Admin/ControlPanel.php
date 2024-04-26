<?php
   session_start();
   $userdata = 0;
   if (isset($_SESSION['autorize']) ) {
	$userdata = $user ->getById($_SESSION['userid']);
   }
   if($userdata['id_role']==3){ ?>
      <div class="nav">
         <a href="">Главная</a>
         <a href="/Admin/createpost/">Создание постов</a>
         <a href="/Admin/look_post/">Просмотреть список постов</a>
         <!-- <a href="/Admin/look_users/">Просмотреть список пользователей</a> -->
      </div>
      <div class="infoposts">
         <?php
            $countPosts = $post ->countAll()[0]['count'];
            $countUsers = $user ->countAll()[0]['count'];
         ?>
         <p>Количество постов - <?=$countPosts ?></p>
         <p>Количество пользователей - <?=$countUsers ?></p>
         <!-- <p>Количество пользователей</p> -->
      </div>

      <?php } ?>