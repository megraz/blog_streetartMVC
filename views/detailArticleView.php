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
<div class="container" style="height:500px">
    <div class="row">
        <div class="col-md-12 ">
            <h1><?=$article['id']?></h1>
            <h2><?=$article['titre']?></h2>
            <strong><?=$article['date']?></strong>
            <strong><?=$article['commentaire']?></strong>
        </div>
    </div>
    <br /><br />
    <a href="/blog_streetartMVC/controllers/listeController.php" style="color: #df247c;">Retour</a>

</div>
<?php
//print_r($articles);
?>

<?php include("footer.php"); ?>
</body>
</html>