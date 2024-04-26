
<?php
	use \Core\Controller;
	use \Project\Models\User;
    $user = new User;
    $Dom = new DOMDocument;
   if (isset($_POST['submitregister'])) {
        $errors = "";
        // var_dump($user->getByName($_POST["username"]));
        // $errorElement = $Dom['documentElement'];
        $datauser = $user->getByName($_POST["username"]);
        if(isset($datauser['name']) ) {
            $errors .="<p>Такой пользователь уже существует</p><br>";
            
        }
        if(strlen($_POST['password']) <8) {
            $errors .="<p>Пароль должен быть длинной не менее 8 символов</p><br>";
        }
        if ($errors == "") {
            $user->create($_POST['username'], $_POST['password']);
        }
        else{
            echo "<div class='error-message'>$errors</div>";
        }
   }
?>
<main>
    <form action="" class="registerform" method="post">
        <div class="form-element">
            <label for="username">Введите Имя</label>
            <input type="text" name="username" placeholder="user" required>
        </div>
        
        <div class="form-element">
            <label for="username">Введите пароль</label>
            <input type="password" name="password" placeholder="password" required>
        </div>
        
        <!-- <div class="form-element">
            <label for="username">Введите код с картинки</label>
            <input type="text" name="captcha" placeholder="Введите капчу" required>
        </div> -->
        
        <div class="form-element">
            <input type="submit" name="submitregister" class="submitregister" value="Зарегестрироваться">
        </div>
    </form>
</main>