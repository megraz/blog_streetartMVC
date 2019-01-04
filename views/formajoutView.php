<?php include("header.php"); ?>
<div class="container" >
<h1>Créer un article</h1>
<!--enctype="multipart/form-data" permet de prévenir le navigateur qu'il s'apprête à envoyer des fichiers-->
<form action="../controllers/processFormController.php" method="POST" enctype="multipart/form-data">
    <label for="title">Titre</label>
    <input id="titre" class="form-control" name="titre" type="text">
    <br /><br /> 
    <p>Commentaire<br /><textarea name="commentaire" rows="10" cols="50"></textarea></p>
    <label for="exampleFormControlFile1"></label>
    <!--type="file" " : il faut utiliser la valeur "file" avec l'attribut type pour créer une balise permettant d'envoyer un fichier-->
    <!--<input type="file" name="images" class="form-control-file" id="fileupload" value="fileupload">-->
    <input type="hidden" name="MAX_FILE_SIZE" value="209715200">
    <p>Choisissez une photo avec une taille inférieure à 2 Mo.</p>
    <input type="file" name="photo">
    <br /><br />
    <?php //$article['date'] = new DateTime();?>
    <select name="categorie" class="form-control form-control-lg">
        <?php 
        foreach($categories as $categorie) { ?>
        ?><option value="<?=$categorie['idcategorie']?>">
            <?=$categorie['nom']?>
        </option>
        <?php
                }
            ?>
    </select>
    <br /><br />
    <input type="submit" class="btn btn-warning" name="ok" value="Envoyer">
</form>
</div>
<div class="col-md-3"></div>
</div>
</div>
</div>
<?php include("footer.php"); ?>
