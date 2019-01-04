<?php
//front controller
//chargement de autoload.php, le model et le router
//se met en liens avec le model, on prend connaissance du model

// rapatrie les donnees nécessaire depuis le model
//appeler la bonne vue
//include('template/template.php');

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');

include ("controllers/controllers.php");

//include("model/model.php");

//ROUTAGE!
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/blog_streetartMVC/index.php' === $uri) {

//include("controllers/listeController.php");
}
elseif ('/blog_streetartMVC/index.php/detail' === $uri) {
    detailArticle();
//include("controllers/detailController.php");
}
elseif ('/blog_streetartMVC/index.php/delete' === $uri) {
    delete();
//include("controllers/deleteController.php");
}
// elseif ('/blog_streetartMVC/index.php/update' === $uri) {
//     update_article();
// include("controllers/updateArticleController.php");
// }
elseif ('/blog_streetartMVC/index.php/modify' === $uri) {
    update_article();
//include("controllers/updateFormController.php");
}
else {
    page404();
// header('HTTP/1.1 404 Not Found');
// echo '<html><body><h1>Page Not Found</h1></body></html>';
}

?>