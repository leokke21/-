<?php
	use \Core\Route;
	
	return [
		new Route('', 'posts', 'Genshinall'),
		new Route('/hello/', 'hello', 'index'), // роут для приветственной страницы, можно удалить
		new Route('/genshin/posts/', 'posts', 'Genshinall'),
		new Route('/honkai_impact/posts/', 'posts', 'Honkaiall'), //
		new Route('/honkai_star_rail/posts/', 'posts', 'Hsrnall'), //
		new Route('/post/:game/:id', 'posts', 'GetOne'),
		
		new Route('/genshin/forum/', 'forum', 'notFound'),
		new Route('/honkai_impact/forum/', 'forum', 'notFound'), //
		new Route('/honkai_star_rail/forum/', 'forum', 'notFound'), //
		// new Route('/genshin/post/:id', 'posts', 'GetOne'),

		
		new Route('/signup/', 'registration', 'register'), //
		new Route('/login/', 'registration', 'login'), //
		new Route('/logout/', 'registration', 'logout'), //
		new Route('/profile/', 'user', 'profile'), //

		
		new Route('/Admin/', 'admin', 'AdminPanel'), //
		new Route('/Admin/createpost/', 'admin', 'createpost'), //
		new Route('/Admin/look_post/', 'admin', 'redactposts'), //
		new Route('/Admin/look_users/', 'admin', 'redactusers'), //

		new Route('/Admin/updatepost/:id', 'admin', 'updatepost'), //
		new Route('/Admin/deletepost/:id', 'admin', 'deletepost'), //
	];
	
