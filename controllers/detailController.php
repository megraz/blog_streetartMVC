<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');

//1. prendre connaissance du model
include ("../model/model.php");

//2. analyse de l'url filtrage NTU
//3.récuperer les donnees nécessaires auprès du model
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $article = get_all_articles_by_id($id);
} else {
    header("Location: /blog_streetartMVC/home.php");
    //header("Location: listeController.php"); //redirection vers une autre page
}
//4.appeler la bonne vue
include ("../views/detailArticleView.php");

?>