<?php
   session_start();
   $userdata = 0;
   if (isset($_SESSION['autorize']) ) {
	$userdata = $user ->getById($_SESSION['userid']);
   }
   if($userdata['id_role']==3){ ?>
      <div class="nav">
         <a href="/Admin/">Главная</a>
         <a href="/Admin/createpost/">Создание постов</a>
         <a href="/Admin/look_post/">Просмотреть список постов</a>
         <!-- <a href="">Просмотреть список пользователей</a> -->
      </div>
      <div class="infoposts">
      </div>

      <?php } ?>