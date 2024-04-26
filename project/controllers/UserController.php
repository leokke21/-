<?php
	namespace Project\Controllers;
	use \Core\Controller;
    use \Project\Models\User;
    use \Project\Models\Comment;
	
	class UserController extends Controller
	{
        public function Profile() {
			$this->title = 'Изменеие профиля';
			
            $user = new User;
			
            return $this->render(
                'profile', 
                [
                    'user' => $user,
                ]
            );
		}
    }