<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
    

   //1. il se met en liens avec le model
   include("model/model.php");

   //2.NTU
   if(!empty($_POST['titre']) && !empty($_POST['content'])) {
       
    $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    
    add_article($titre, $content);
    include("views/successView.php");
   } else {
       header("Location: formAjoutController.php");
   }



?>