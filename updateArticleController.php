<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');


//1. se met en lien avec le model
include("model/model.php");

//2. analyse et gestion de l'url filtrage NTU
//3.récuperer les donnees nécessaires auprès du model
if(isset($_POST['id']) && !empty($_POST['titre']) && !empty($_POST['commentaire'])) {
   
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
    $titre= filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
    $commentaire = filter_var($_POST['commentaire'], FILTER_SANITIZE_STRING);
   /* echo $id; 
    echo $titre;
    echo $commentaire;*/
    //update_article($id, $_POST['titre'], $_POST['commentaire']);
    update_article($id, $titre, $commentaire);//je garde la veleur déjà filtrée plus haut
    
    //$article = get_article_by_id($id);
} else {
    header("Location: listeController.php"); //redirection vers une autre page
}
//echo "lala" .$id;
//4.appeler la bonne vue
include ("views/UpdateArticleView.php");

?>
