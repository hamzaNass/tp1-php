<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Mailer\Email;

   class EmailsController extends AppController{
      public function index(){
         $email = new Email('default');
         $email->to('hamza-nassi@hotmail.fr')->subject('Envoie Email TP1')->send('yo');
      }
   }
?>

