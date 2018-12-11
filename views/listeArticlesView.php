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
        </tr>
    </thead>
    <tbody>
    <?php foreach($articles as $article) {
        ?>
  
        <tr>
            <td><?=$article['id']?></td>
            <td><?=$article['titre']?></td>
            <td><?=$article['date']?></td>
            <td><a href="detailController.php?id=<?=$article['id']?>">Voir le détail</a></td>
            <td><a href="deleteController.php?id=<?=$article['id']?>">Supprimer</a></td>
            <td><a href="updateFormController.php?id=<?=$article['id']?>">Modifier</a></td>
        </tr>
        <?php   } ?>
    </tbody>

</table>
<a href="formAjoutController.php">Ajouter un article</a>
<?php
//print_r($articles);
?>
    
</body>
</html>