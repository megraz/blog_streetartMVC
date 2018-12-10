<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
    

   //1. il se met en liens avec le model
   include("model/model.php");
    //print_r($_POST);
   //2.NTU
   //titre, date, commentaire, photo
   if(!empty($_POST['titre']) && !empty($_POST['commentaire']) ) {
       
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
    
        $commentaire = filter_var($_POST['commentaire'], FILTER_SANITIZE_STRING);
        
        add_article($titre,  $commentaire);
        include("views/successView.php");
   } else {
       header("Location: formAjoutController.php");
   }

?>