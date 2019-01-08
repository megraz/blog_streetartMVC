<?php
// ini_set('display_errors', 1);
// ini_set('log_errors', 1);
// ini_set('error_log', dirname(__file__) . '/log_error_php.txt');

// include ("../User.php");
// include ("../model/model.php");

// if (isset($_POST['inscription'])) {
//     $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//     $user = new DataBase();
//     $user->createUser(new User($post['pseudo'], md5($post['mdp']), $post['avatar'], $post['genre'], $post['age']));
//     header("location:index.php");
//     session_start();
//     $_SESSION['nom'] = $post['pseudo'];
//     $_SESSION['avatar'] = $post['avatar'];
//     $_SESSION['genre'] = $post['genre'];
//     $_SESSION['age'] = $post['age'];
// }
//On lance la session à l'inscription et on y stock le nom d'utilisateur
?>