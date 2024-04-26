<?php
   session_start();
   $userdata = 0;
   if (isset($_SESSION['autorize']) ) {
	$userdata = $user ->getById($_SESSION['userid']);
   }
   else{
    header("Location: /");
   }
   if($userdata['avatar'] == null) {
    $userdata['avatar'] = '0.jpg';
}
    if(isset($_POST['submitUpdate'])) {
        // Изменение имени
        if(isset($_POST['username'])) {
            $userdata['name'] = $_POST['username'];
        }
        // Добавление картинки
        $image_name = $userdata['name'].'.jpg';
        if(isset($_FILES['avatar-image'])) {

          $image_tmp = $_FILES['avatar-image']['tmp_name'];
          // Перемещение картинки
           move_uploaded_file($image_tmp, __DIR__."/../webroot/img/users//$image_name"); 
        }
        $user ->Edit($userdata['id'], $userdata['name'], $image_name );
    }

?>
<main>
    <form class="profile" method="post" enctype="multipart/form-data">
        <!-- Ввод картинки -->
        <div class="flex-reverse">
        <label class="input-file">
            <!-- картинка пользователя -->
            <input type="file" id="post-image"  name="avatar-image" accept="image/jpeg"  class='m-20'>
        </label>
            <div class="avatar-image">  <div class="user-avatar"><img src="/project/webroot/img/users/<?= $userdata['avatar'] ?>" alt="avatar"> </div> </div>

        </div>
        <div class="fields">
            <label for="username" class='label'>Имя пользователя</label>
            <input type="text" name="username" value='<?= $userdata['name'] ?>'class='input-text'>
            <!-- <div class="one-post-text"> -->
                <!-- <input type='password' class='text ' name='password'> -->
            <!-- </div> -->
            <input type="submit" value="Обновить" name="submitUpdate" class='buttton'>
        </div>
        
             
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
                let new_file_input = '<div class="user-avatar">' +
                    '<img class="avatar-img" src="' + reader.result + '">';
                $files_list.append(new_file_input);
            }
        };
        this.files = dt.files;
    });
    
    
</script>