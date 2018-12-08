<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Liste des articles</title>
</head>
<body>
<h1><?=$article['id']?></h1>
<h2><?=$article['titre']?></h2>
<strong><?=$article['date']?></strong>
<strong><?=$article['commentaire']?></strong>
<?php
//print_r($articles);
?>
    
</body>
</html>