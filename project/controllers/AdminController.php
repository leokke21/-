<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Post;
   use \Project\Models\User;
   use \Project\Models\Comment;
	// use \Project\Models\Comment;
	
	class AdminController extends Controller
	{
		public function AdminPanel() {
			$this->title = 'Панель администратора';
			
            $user = new User;
            $post = new Post;
			
			
            return $this->render(
                'Admin/ControlPanel', 
                [
                    'user' => $user,
                    'post' => $post,
                ]
            );
		}
        public function createpost() {
			$this->title = 'Создание поста';
			
            $user = new User;
			$post = new Post;
			
			
            return $this->render(
                'Admin/createpost', 
                [
                    'user' => $user,
                    'post' => $post,
                ]
            );
		}
        public function redactposts() {
			$this->title = 'Все посты - просмотр';
			
            $user = new User;
			$post = new Post;
			
			
            return $this->render(
                'Admin/redactpost', 
                [
                    'user' => $user,
                    'post' => $post,
                ]
            );
		}
        public function deletepost($id) {

            $this->title = 'Все посты - просмотр';
			
            $user = new User;
			$post = new Post;
			
			$post->delete($id['id']);
            return $this->render(
                'Admin/redactpost', 
                [
                    'user' => $user,
                    'post' => $post,
                ]
            );
        }
        
        public function updatepost($params) {
            $posts = new Post;
            $comments = new Comment;
            $data = $posts->getById($params['id']);
            
			$this->title = 'Редактирование поста';
            return $this->render(
                'Admin/updatepost', 
                [
                    'id' => $params['id'],
                    'data' => $data,
                    'comments' => $comments->PgetAll($params['id'])
                ]
            );
        }

        public function redactusers($params) 
        {
			$this->title = 'Все Пользовавтели - просмотр';
			
            $user = new User;
			$post = new Post; 
			
			
            return $this->render(
                'Admin/redactusers', 
                [
                    'user' => $user,
                    'post' => $post,
                ]
            );
        }
    }
?>