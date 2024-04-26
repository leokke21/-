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
         <a href="">Просмотреть список постов</a>
         <!-- <a href="/Admin/look_users/">Просмотреть список пользователей</a> -->
      </div>
      <div class="infoposts">
        <?php
        //    $posts = $post->getAllPosts();
           $categories = $post->getAllCategories();
        ?>
               <form action="" method = 'post' class='selectposts'>
                  <select name="category">
                   <?php
                   foreach ($categories as $category) { ?>
                        <option value="<?=$category['name_category']?>">
                           <?= $category['name_category'] ?>
                        </option>

                       <?php }
                    ?>
                  </select>
                  <input type="submit" name="select_category" value="Выбрать" class='buttton'>
               </form>
      </div>
      <?php } 
      if(isset($_POST['select_category'])){
         $posts = $post->getAll($_POST["category"]);
         echo '<table class = "table-all-posts">'; ?>
         <tr>
            <td>№</td>
            <td>Заголовок</td>
            <td>автор</td>
            <td>Дата</td>
         </tr>
          <?php foreach($posts as $item) { ?>
            <tr>
               <td> <?= $item['id'] ?></td>
               <td> <?= $item['header'] ?></td>
               <td> <?= $item['author'] ?></td>
               <td> <?= $item['data'] ?></td>
               <td> <button onclick = "UpdatePost(<?= $item['id']?>)" class='buttton'>Редактировать</button></td>
               <td> <button onclick = "DeletePost(<?= $item['id']?>)" class='buttton'>Удалить</button></td>
            </tr>
        <?php }
        echo '</table>';
      }
      ?>
      
<script>
   function select_category( category) {
      let table = document.getElementsByClassName("hidden")[0];
      table.classList.remove('hidden');
      
   }
   function UpdatePost(id) {
      window.location.href = `/Admin/updatepost/${id}`;
   }
   function DeletePost(id) {
      
      window.location.href = `/Admin/deletepost/${id}`;
   }
</script>