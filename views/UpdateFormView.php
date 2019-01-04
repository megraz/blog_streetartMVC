<?php include("header.php"); ?>

<div class="container">
    <h1>Modifier l'article</h1>
    <form action="../controllers/updateArticleController.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $article['id']?>"/>
        <label for="title">Titre</label>
        <input type="text" class="form-control" name="titre" value="<?php echo $article['titre'];?>"/>
        <br /><br />
        <!-- <label>Commentaire</label> -->
        <!-- <input type="text" name="commentaire" value="<?php //$article['commentaire'];?>"/> -->
        <p>Commentaire<br /><textarea name="commentaire" rows="10" cols="50" ><?php echo $article['commentaire'];?></textarea></p>
        <br /><br />
        <input type="submit" class="btn btn-warning" value="mettre à jour"/>
    </form>
    <br /><br />
    <!-- <a href="/blog_streetartMVC/controllers/listeController.php" style="color: #df247c;">Retour</a> -->
</div>

<?php include("footer.php"); ?>
