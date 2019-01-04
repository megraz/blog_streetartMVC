<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Liste des articles</title>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>titre</th>
            <th>date</th>
            <th>Voir</th>
            <th>Supprimer</th>
            <th>Modifier</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($articles as $article) {
        ?>
  
        <tr>
            <td><?=$article['id']?></td>
            <td><?=$article['titre']?></td>
            <td><?=$article['date']?></td>
            <td><a href="../controllers/detailController.php?id=<?=$article['id']?>">Voir le détail</a></td>
            <td><a href="../controllers/deleteController.php?id=<?=$article['id']?>">Supprimer</a></td>
            <td><a href="../controllers/updateFormController.php?id=<?=$article['id']?>">Modifier</a></td>
        </tr>
        <?php   } ?>
    </tbody>

</table>
<a href="../controllers/formAjoutController.php">Ajouter un article</a>
<?php
//print_r($articles);
?>
<?php include("footer.php"); ?> 
</body>
</html>

<?php
function add_article($titre,  $commentaire) { 
    //echo "<br /> $titre";
    //echo "<br /> $commentaire";
     //se connecterà la bdd
     $pdo = connectDB();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //preparer une requete insert au format texte
     $sql ="INSERT INTO  article (titre,  commentaire ) VALUES (:titre, :commentaire); ";
     $statement = $pdo->prepare($sql);
     $statement->bindValue(':titre', $titre);
     
     $statement->bindValue(':commentaire', $commentaire);
    try{
       $statement->execute();
      
    } catch (PDOException $e) {
       echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
 }
?>
<!--consequence ds processformcontroller.php-->
<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
    

   //1. il se met en liens avec le model
   include("../model/model.php");
    //print_r($_POST);
   //2.NTU
   //titre, date, commentaire, photo
   if(!empty($_POST['titre']) && !empty($_POST['commentaire']) ) {
       
        $titre = filter_var($_POST['titre'], FILTER_SANITIZE_STRING);
    
        $commentaire = filter_var($_POST['commentaire'], FILTER_SANITIZE_STRING);
        
        add_article($titre,  $commentaire);
        include("../views/successView.php");
   } else {
    //    header("Location: formAjoutController.php");
    header("Location: formAjoutController.php");
   }

?>

<?php
//model.php

function add_articleSavecdate($titre, $date, $commentaire, $photo) { 
   //echo "<br /> $titre";
   //echo "<br /> $commentaire";
    //se connecterà la bdd
    $pdo = connectDB();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparer une requete insert au format texte
    $sql ="INSERT INTO  article (titre,  commentaire, photo ) VALUES (:titre, :date('Y-m-d H:i:s'), :commentaire :photo); ";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':titre', $titre);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':commentaire', $commentaire);
    $statement->bindValue(':photo', $photo);
   try{
      $statement->execute();
     
   } catch (PDOException $e) {
      echo 'Échec lors de la connexion : ' . $e->getMessage();
   }
}


?>