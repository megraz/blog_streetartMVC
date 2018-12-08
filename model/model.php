<?php

function connectDB() {
    //connexion bdd
    $user= 'admin';
    $pass= 'simplon';
    $pdo = new PDO('mysql:host=localhost;dbname=street_art;charset=utf8',$user, $pass);
    //$pdo->query("SET NAMES 'utf8'");
    return $pdo; //bien faire un return pr terminer immédiatement la fonction  
    //et retourne l'argument qui lui est passé
}

function get_all_articles() {
    //connexion bdd
    $pdo = connectDB();
    //preparation requete sql en texte
    $sql= "SELECT * FROM post;";
    //transformer en vrai requete preparer
    $statement = $pdo->prepare($sql);
    //bindvalue
    //$statement->bindValue(':id');
    //execution
    $statement->execute();
    //fetchall
    $results = $statement->fetchAll();
    //fermer la connexion
    $pdo = null;
    //renvoyer les donnees
    return $results;
}

function get_all_articles_by_id($id) {
    $pdo = connectDB();
    //preparation requete sql en texte
    $sql= "SELECT * FROM post WHERE id=:id;";
    //transformer en vrai requete preparer
    $statement = $pdo->prepare($sql);
    //bindvalue
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    //execution
    $statement->execute();
    //fetchall
    $results = $statement->fetch(); //pas de fetchAll puisqu'on ne veut récup qu'un article
    //fermer la connexion
    $pdo = null;
    //renvoyer les donnees
    return $results;
}

function getAllCategories() {
    $pdo = connectDB();
    $statement = $pdo->prepare("SELECT * FROM categorie");//2.3. CONSTRUIRE LA REQUETE SQL AU FORMAT TEXTE et PREPARER LA REQUETE
    $statement->execute();//4. EXECUTER LA REQUETE
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);//5.ac fetchAll je récupère ts les résultats ds 1 [] les résultats st exploitables
    $pdo = null;
    //renvoyer les donnees
    return $results;
}

function add_article($titre, $date, $nom, $commentaire, $categorie_idcategorie) { 
    //se connecterà la bdd
    $pdo = connectDB();
    //preparer une requete insert au format texte
    $sql ="INSERT INTO  post (titre, date , nom, commentaire, categorie_idcategorie) VALUES (:titre, :date, :nom, :commentaire, :categorie_idcategorie); ";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':titre', $titre);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':nom', $nom);
    $statement->bindValue(':commentaire', $commentaire);
    $statement->bindValue(':categorie_idcategorie', $categorie_idcategorie);
    $statement->execute();
}

function delete_post($id) {
    //se connecter à la bdd
    $pdo = connectDB();
    //preparer une requete insert au format texte
    $sql = "DELETE FROM post WHERE id=:id;";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
}

/*
function testFormulaire() {
    // isset = test le formulaire ; is_dir= verifie si la variable correspond à isset
if (isset($_POST['filename'])){ //on utilise isset pr vérifier que le fichier existe//
    //on récupère les données titre du fichier et on rajoute basename([], ".txt") pr supp le txt qui s'ecrit en plus//
    $titre = htmlspecialchars(basename($_POST['filename'], ".txt")); 
    $images = htmlspecialchars(file_get_contents('post/'.$_POST['images']));
    $categorie = htmlspecialchars(file_get_contents('post/'.$_POST['categorie']));
    $commentaire = htmlspecialchars(file_get_contents('post/'.$_POST['filename'])); // on recup le contenu et on y accède//
    }
}
*/

?>