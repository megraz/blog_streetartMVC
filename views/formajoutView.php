<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Créer un article</h1>
            <!--enctype="multipart/form-data" permet de prévenir le navigateur qu'il s'apprête à envoyer des fichiers-->
            <form action="processFormController.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input id="titre" class="form-control" name="titre" type="text">
                </div>
                <?php $article['date'] = new DateTime();?>
                <div class="form-group">
                    <label for="nom">Nom de l'artiste</label>
                    <input id="nom" class="form-control" name="nom" type="text">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1"></label>
                    <!--type="file" " : il faut utiliser la valeur "file" avec l'attribut type pour créer une balise permettant d'envoyer un fichier-->
                    <input type="file" name="images" class="form-control-file" id="fileupload" value="fileupload">
                </div>
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
                <div class="form-group">
                    <label for="content">Message</label>
                    <textarea name="commentaire" class="form-control" id="commentaire" rows="10"></textarea>
                </div>
                <input type="submit" class="btn btn-warning" value="Envoyer" style="margin-bottom: 10px;">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>