<?php
	use \Project\Models\Post;
   session_start();
   $userdata = 0;
   if (isset($_SESSION['autorize']) ) {
	$userdata = $user ->getById($_SESSION['userid']);
   }
   if(isset($_POST['submitUpdate'])) {

      $post = new Post;
      $image_path = '';
      
      $today_date = date('Y-m-d');
      // Добавление картинки
      if(isset($_FILES['post-image'])) {
          // print(1);
          $image_name = $_FILES['post-image']['name'];
          $image_tmp = $_FILES['post-image']['tmp_name'];
         
          // Путь для сохранения картинки 
         switch($_POST['category']) {
            case 1:
               $folder = 'Genshin';
               break;
            case 2:
               $folder = 'honkai_impact';
               break;
            case 3   :
               $folder = 'Honkai_star_rail';
               break;
         }

         // Перемещение картинки
          move_uploaded_file($image_tmp, __DIR__."/../../webroot/img/posts/$folder/$image_name");
          
          $image_path = $image_name;    
      }
      $post ->Create( $_POST['header'],$userdata['name'], $today_date, $_POST['text'], $image_path, $_POST['category'] );
 }

   if($userdata['id_role']==3){ ?>
      <div class="nav">
         <a href="/Admin/">Главная</a>
         <a href="">Создание постов</a>
         <a href="/Admin/look_post/">Просмотреть список постов</a>
         <!-- <a href="/Admin/look_users/">Просмотреть список пользователей</a> -->
      </div>
   
   <?php } ?>
      <?php
?>
<main>
    <form class="post" method="post" enctype="multipart/form-data">
        
        <!-- Ввод картинки -->
        <label class="input-file">
                <input type="file" id="post-image" name="post-image" accept="image/png, image/jpeg"  class='m-20'>
        </label>
        <div class="post-image"> 

        </div>
                
        <div class="one-post-info">
        </div>
                <input type="text" name="header" class='h1' value='Введите заголовок'>
        <div class="one-post-text">
            <textarea class='text textarea' name='text'>Введите содержание поста</textarea>
        </div>
        <!-- Выбор категории -->
        <?php $categories = $post->getAllCategories(); ?>
            <select name="category">
             <?php
             foreach ($categories as $category) { ?>
                  <option value="<?=$category['id_category']?>">
                     <?= $category['name_category'] ?>
                  </option>
                 <?php }
              ?>
            </select>
        <!--  -->

        <input type="submit" value="Создать" name="submitUpdate" class='buttton'>
             
    </form>
    
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    let dt = new DataTransfer();

    $('.input-file input[type=file]').on('change', function () {
        let $files_list = $(this).closest('.input-file').next();
        $files_list.empty();

        for (let i = 0; i < this.files.length; i++) {
            let file = this.files.item(i);
            dt.items.add(file);

            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function () {
                let new_file_input = '<div class="input-file-list-item">' +
                    '<img class="input-file-list-img" src="' + reader.result + '">';
                $files_list.append(new_file_input);
            }
        };
        this.files = dt.files;
    });
    
    
</script>