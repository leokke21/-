<?php
	use \Project\Models\Post;
   if(isset($_POST['submitUpdate'])) {

        $post = new Post;
        $image_path = $data['image'];
        if(isset($_FILES['post-image'])) {
            // print(1);
            $image_name = $_FILES['post-image']['name'];
            $image_tmp = $_FILES['post-image']['tmp_name'];
            
            move_uploaded_file($image_tmp, __DIR__."/../../webroot/img/posts/" .$data['name_category']."/$image_name");
            
            $image_path = $image_name;    
        }
        $post ->Edit($data['id'], $_POST['header'],$data['data'], $_POST['text'], $image_path, $data['id_category'] );
   }
?>
<main>
    <form class="post" method="post" enctype="multipart/form-data">
        
        <!-- Ввод картинки -->
        <label class="input-file">
                <input type="file" id="post-image" name="post-image" accept="image/png, image/jpeg"  class='m-20'>
        </label>
        <div class="post-image">
        <img src="\project\webroot\img\posts\<?=$data['name_category']?>\<?= $data['image'] ?>" alt="ris" >

        </div>
                
        <div class="one-post-info">
        </div>
                <input type="text" name="header" class='h1' value='<?= $data['header']?>'>
        <div class="one-post-text">
            <textarea class='text textarea' name='text'><?=  $data['text']; ?></textarea>
        </div>
        <input type="submit" value="Изменить" name="submitUpdate" class='buttton'>
             
    </form>
    <div class="commentaries">
        <div class="addcomment">
            <input type="text" placeholder="Нужно быть зарегестрированным польхователем чтобы оставлять комментарии" disabled>
            <button onclick="" disabled>Отправить</button>
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
                            <p><?= $comment['likes'] ?></p>
                        </div>
                    </div>

                </div>
           <?php }
        ?>
    </div>
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