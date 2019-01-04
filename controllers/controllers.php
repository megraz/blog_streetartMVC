<?php
function liste() {
    include ("model/model.php");
    $results = get_all_articles();
    include ("views/listeArticlesView.php");
}

function detailArticle() {
    include ("model/model.php");

    //2. analyse de l'url filtrage NTU
    //3.récuperer les donnees nécessaires auprès du model
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        $article = get_all_articles_by_id($id);
    } else {
        header("Location: /blog_streetartMVC/index.php");
        //header("Location: listeController.php"); //redirection vers une autre page
    }
    //4.appeler la bonne vue
    include ("views/detailArticleView.php");

}

function page404() {
    header('HTTP/1.1 404 Not Found');
    include ("views/404.php");
    }

function delete_article() {
    include ("model/model.php");
    include ("views/listeArticlesView.php");
}

function update_article() {
    include ("model/model.php");
    include ("views/listeArticlesView.php");
}
?>