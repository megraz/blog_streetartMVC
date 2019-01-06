<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
    

   //1. il se met en liens avec le model
   include("../model/model.php");
    //print_r($_POST);
   //2.NTU
   //titre, date, commentaire, photo
   if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0)
{
  // Testons si le fichier n'est pas trop gros
  if ($_FILES['photo']['size'] <= 1000000)
  {
    // Testons si l'extension est autorisée
    $infosfichier = pathinfo($_FILES['photo']['name']);
    $extension_upload = $infosfichier['extension'];
    $extensions_autorisees = array('jpg', 'jpeg', 'JPG', 'gif', 'png');
    if (in_array($extension_upload, $extensions_autorisees))
    {
      // On peut valider le fichier et le stocker définitivement
      try { //utiliser un try catch pr voir les erreurs pr gerer les exceptions ici pblm de droits => ls - lisa ds T. chmod -R o+w photos/
        move_uploaded_file($_FILES['photo']['tmp_name'], '../photos/' . basename($_FILES['photo']['name']));
      } catch (Exception $e) {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
        die();
      } 
    }
  }
}
  //$date = date('Y-m-d H:i:s');
  //$date = new DateTimeZone('Europe/Paris');
  //date_default_timezone_set('Europe/Paris'); 
  $date = new DateTime('now', new DateTimeZone('Europe/Paris'));
  $date = $date->format('Y-m-d H:i:s');
  //echo $date; 
   if(!empty($_POST['titre']) && !isset($_POST['date']) && !empty($_POST['commentaire'])) {
       
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
        //$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
        $commentaire = filter_var($_POST['commentaire'], FILTER_SANITIZE_STRING);
        $photo = filter_var(basename($_FILES['photo']['name']),FILTER_SANITIZE_STRING,FILTER_NULL_ON_FAILURE);
        add_article($titre, $date, $commentaire, $photo);
        include("../views/successView.php");
   } else {
    //    header("Location: formAjoutController.php");
    header("Location: formAjoutController.php");
   }

?>