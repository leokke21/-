<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Post;
	use \Project\Models\Comment;
	use \Project\Models\User;
	
	class PostsController extends Controller
	{
		public function Genshinall() {
			$this->title = 'Genshin impact Все статьи';
			
			$posts = new Post; // тестовая модель для проверки базы
			
			
            $data = $posts->getAll("Genshin");
            return $this->render(
                'posts', 
                [
                    'data' => $data,
                    'game' => 'genshin',
                ]
            );
		}
        public function Honkaiall() {
			$this->title = 'Honkai Impact Все статьи';
			
			$posts = new Post; // тестовая модель для проверки базы
			
			
            $data = $posts->getAll("Honkai Impact");
            return $this->render(
                'posts', 
                [
                    'data' => $data,
                    'game' => 'honkai impact',
                ]
            );
		}
        public function Hsrnall() {
			$this->title = 'Honkai Star Rail Все статьи';
			
			$posts = new Post; // тестовая модель для проверки базы
			
			
            $data = $posts->getAll("Honkai Star Rail");
            return $this->render(
                'posts', 
                [
                    'data' => $data,
                    'game' => 'honkai star rail',
                ]
            );
		}
    
        public function GetOne($params) 
        {
            $posts = new Post;
            $comments = new Comment;
            $user = new User;
            $data = $posts->getById($params['id']);
            
            $this->title = 'Статья '.$params['id'];
            return $this->render(
                'post', 
                [
                    'id' => $params['id'],
                    'data' => $data,
                    'user' => $user,
                    'comment' => $comments,
                    'comments' => $comments->PgetAll($params['id']),
                    'game' => $params['game'],
                ]
            );
        }
    }
?>