<?php
   namespace Project\Controllers;
   use \Core\Controller;
   
   class registrationController extends Controller
   {
       public function register() {
           $this->title = 'Регистрация';
           
           return $this->render('signup');
       }
       public function login() {
           $this->title = 'Вход';
           
           return $this->render('login');
       }
       public function logout() {
        //    $this->title = 'Вход';
           
           return $this->render('logout');
       }
   }
?>