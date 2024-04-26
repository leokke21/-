<?php
    session_start();
	use \Core\Controller;
	use \Project\Models\User;
    $user = new User;

    $login = isset($_POST['username']) ? $_POST['username'] : "" ;
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $errors = "";

   if (isset($_POST['submitregister'])) {
        // print_r($user->getByName($_POST["username"]));
        $datauser = $user->getByName($_POST["username"]);
        if(isset($datauser['name']) ) {
            // print 1;
            if($_POST['password']== $datauser['password']) {
                // print( 2);
                $_SESSION['autorize'] = true;
                $_SESSION['userid'] = $datauser['id'];
                // print($_SESSION['autorize']);
                header("Location: /");
            }
            else{
                $errors = "Неверный пароль";
            }
        }
        else{
            $errors = "Такого пользователся не существует";
        }
        
   }
?>
<main>
    <form action="" class="registerform" method="post">
        <div class="form-element">
            <label for="username">Введите Имя</label>
            <input type="text" name="username" placeholder="user" value="<?= $login ?>" required>
        </div>
        
        <div class="form-element">
            <label for="username">Введите пароль</label>
            <input type="password" name="password" placeholder="password" value="<?= $password ?>" required>
        </div>
        
        
        <div class="form-element">
            <input type="submit" name="submitregister" class="submitregister" value="Войти">
        </div>
        <div class="error">
            <?php
               if ($errors != "") {
                echo `<p> $errors</p>`;
                }
            ?>
        </div>
    </form>
</main>