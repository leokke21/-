<?php
   namespace Project\Controllers;
   use \Core\Controller;
   
   class ForumController extends Controller
   {
       public function notFound() {
           $this->title = 'Тут ничего нет';
           
           return $this->render('forum');
       }
   }
?>