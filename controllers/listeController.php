<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);   
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');

//1.se mettre en lien avec le modèle
include ('../model/model.php');

//2.analyse la requête de l'utilisateur
//si besoin analyser les param (NTU)

//3. Demander au model les données nécessaires
// (si il en faut) et les socker ds des variables
$articles = get_all_articles();
//4. appeler la bonne vue, le bon template
include ("../views/listeArticlesView.php");

?>