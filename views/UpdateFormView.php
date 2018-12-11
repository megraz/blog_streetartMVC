<form action="updateArticleController.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $article['id']?>"/>
    <label>Titre</label>
    <input type="text" name="titre" value="<?php echo $article['titre'];?>"/>
    <br /><br />
    <label>Commentaire</label>
    <!-- <input type="text" name="commentaire" value="<?php //$article['commentaire'];?>"/> -->
    <textarea name="commentaire" rows="10" cols="50" ><?php echo $article['commentaire'];?></textarea>
    <br /><br />
    <input type="submit" value="mettre à jour"/>
</form>