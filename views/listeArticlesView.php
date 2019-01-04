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
    <div class="row" style="overflow:hidden;">
    <div class="col-md-12 text-center">
    <h1>Liste des articles</h1>
    </div>
    </div>
    <?php foreach($articles as $article) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-1"><p>id<?=$article['id']?></p></div>
                        <div class="col-md-3"><p>titre<?=$article['titre']?></p></div>
                        <div class="col-md-3"><p>date<?=$article['date']?></p></div>
                        <div class="col-md-5"><img src='../photos/<?=$article['photo']?>' width='200px' height='200px'/></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4"><a href="../controllers/detailController.php?id=<?=$article['id']?>">Voir le détail</a></div>
                        <div class="col-md-4"><a class="btn btn-primary" href="../controllers/updateFormController.php?id=<?=$article['id']?>">Modifier</a></div>
                        <div class="col-md-4"><a class="btn btn-danger" href="../controllers/deleteController.php?id=<?=$article['id']?>">Supprimer</a></div>
                    </div>
                </div>
            </div>
        </div>



        <?php   } ?>
    <div class="row">
        <div class="col-md-12 text-center">
        <br /><br />
            <a class="btn btn-success" href="../controllers/formAjoutController.php">Ajouter un article</a>
        </div>
    </div>
<?php
//print_r($articles);
?>
<?php include("footer.php"); ?> 
</body>
</html>