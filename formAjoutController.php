<?php
//prendre connaissance du model
include ("model/model.php");
$categories = getAllCategories();
//include ("template/createArticle.html");
//$testForm = testFormulaire();
//$ajouterArticle = ajoutArticle();

//1. se mettre en lien avec le model
//2. vérifier l'url 
//3. rappatrier les données du model
//4. charger le bon template.
//charger le formulaire
include ("views/formajoutView.php");

?>

