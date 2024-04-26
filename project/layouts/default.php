<?php
   if(!isset($_SESSION)) 
   { 
	   session_start(); 
   } 
   use \Project\Models\User;
   $user = new User;
   if (isset($_SESSION['autorize']) ) {
	$userdata = $user ->getById($_SESSION['userid']);
   }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="/project/webroot/Style/header.css">
		<link rel="stylesheet" href="/project/webroot/Style/main.css">
		<link rel="stylesheet" href="/project/webroot/Style/admin.css">
		<link rel="shortcut icon" href="/project/webroot/Лого.png" />
		
	</head>
	<body>
		<header>
		    <div class="uppbutons">
		        <!-- Ссылки на другие игры -->
		        <div class="nav-menu">
		            <a href="/genshin/posts/" id='genshin' class="uppbuton">Genshin impact <img src="/project/webroot/img/Genshin.png" alt="" class='micro-ico'></a>
		            <a href="/honkai_impact/posts/" id='honkai' class="uppbuton" >Honkai Impact 3rd <img src="/project/webroot/img/Honkai impact.png" alt="" class='micro-ico'></a>
		            <a href="/honkai_star_rail/posts/" id='hsr'  class="uppbuton">honkai Star Rail <img src="/project/webroot/img/honkai star rail.png" alt="" class='micro-ico'></a>
					<?php
					if (isset($_SESSION['autorize']) ) { 
						if($userdata['id_role'] >= 2  ) { ?>
							<a href="/Admin/"  id='admin' class="uppbuton">Панель администратора</a>
						<?php } else{ ?>
							<a class="uppbuton">Тут могла быть ваша реклама:(</a>
						<?php } } else { ?>
							<a class="uppbuton">Тут могла быть ваша реклама:(</a>
						<?php }?>
		            
		        </div>
				<?php
				   if (isset($_SESSION['autorize']) ) {
					if ($_SESSION['autorize']) {
						
						if($userdata['avatar'] == null) {
							$userdata['avatar'] = '0.jpg';
						}
					}
					
				?>
				<!-- HTML -->
				<!-- Авторизованный пользоатель -->
				<div class="autorized">
					<a class="menu-avatar" href ='/profile/'>
						<img src="/project/webroot/img/users/<?= $userdata['avatar'] ?>" alt="avatar">
					</a>
					<h3><?= $userdata['name'] ?></h3>
					<button class = "exit-account" onclick="logout()"> <img src="/project/webroot/img/exit.png" alt=""> </button>
				</div>
				<?php	   
				   } else {
				?>
		        <!-- Регистация/вход/аккаунт -->
		        <div class="autorization">
		            <!-- stcicky -->
		            <a href="/signup/">SignUp</a>
		            <a href="/login/">Login</a>
		        </div>

				<?php
					}
				?>

		    </div>

		<img src="\project\webroot\img\header-line.svg" alt="" class="header-line">

		    <div class="downbuttons">

		        <!-- Форум и Новости -->

		        <!-- <a href="" class="Button">Новости Недели</a> -->
				<button onclick="News()">Новости Недели</button>
		        <button onclick="forum()"> Форум</button>
		    </div>
		</header>
		<?php
		//    print_r($_SESSION);
		//    session_destroy();
		?>
		<?= $content ?>
	</body>
	<!-- <footer>
		<div class="contacts">
			<a href=""><img src="\project\webroot\img\Telegram.png" alt=""></a>
			<a href=""><img src="\project\webroot\img\VK.svg" alt=""></a>
		</div>
	</footer> -->
</html>
<script>
	function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
	// alert(getCookie('game'));
	function News() {
		window.location.href = "/"+getCookie('game')+"/posts/"
	}
	function forum() {
		window.location.href = "/"+getCookie('game')+"/forum/"
	}
	function logout() {
		window.location.href = "/logout/"
	}
	// game Active
	let gamename =getCookie('game');
	
	let gamebutton =document.getElementById('genshin');

	switch (gamename) {
		case 'genshin':
			gamebutton =document.getElementById('genshin');
			gamebutton.classList.add('uppbutons-active');
			break;
		case 'honkai_impact':
			gamebutton =document.getElementById('honkai');
			gamebutton.classList.add('uppbutons-active');
			break;
		case 'honkai_star_rail':
			gamebutton =document.getElementById('hsr');
			gamebutton.classList.add('uppbutons-active');
			break;
		// case 'admin':
		// 	gamebutton =document.getElementById('admin');
		// 	gamebutton.classList.add('uppbutons-active');
		// 	break;
		default:
			gamebutton =document.getElementById('genshin');
			gamebutton.classList.add('uppbutons-active');
			break;
	}
</script>