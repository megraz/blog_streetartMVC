<?php

function connectDB() {
    //connexion bdd
    $user= 'admin';
    $pass= 'simplon';
    $pdo = new PDO('mysql:host=localhost;dbname=blogstreetart;charset=utf8',$user, $pass);
    //$pdo = new PDO('mysql:host=localhost;dbname=street_art;charset=utf8',$user, $pass);
    //$pdo->query("SET NAMES 'utf8'");
    return $pdo; //bien faire un return pr terminer immédiatement la fonction  
    //et retourne l'argument qui lui est passé
}

function get_all_articles() {
    //connexion bdd
    $pdo = connectDB();
    //preparation requete sql en texte
    $sql= "SELECT * FROM article;";
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
    $sql= "SELECT * FROM article WHERE id=:id;";
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
//************mettre photo et modif apres processFormController.php nb sauvegarde sur brouillon.php ***********/
function add_article($titre,$date, $commentaire, $photo) { 
   //echo "<br /> $titre";
   //echo "<br /> $commentaire";
    //se connecterà la bdd
    $pdo = connectDB();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparer une requete insert au format texte
    $sql ="INSERT INTO  article (titre, date, commentaire, photo ) VALUES (:titre, :date, :commentaire, :photo);";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':titre', $titre);
    $statement->bindParam(':date', $date, strtotime (date ('Y-m-d H:i:s')), PDO::PARAM_STR);
    $statement->bindValue(':commentaire', $commentaire);
    $statement->bindValue(':photo', $photo);
   try{
      $statement->execute();
     
   } catch (PDOException $e) {
      echo 'Échec lors de la connexion : ' . $e->getMessage();
   }
}


function delete_article($id) {
    //se connecter à la bdd
    $pdo = connectDB();
    //preparer une requete insert au format texte
    $sql = "DELETE FROM article WHERE id=:id; ";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
}

function get_article_by_id($id) { //pr update
   $pdo = connectDB();
   //preparation requete sql en texte
   $sql= "SELECT * FROM article WHERE id=:id;";
   //transformer en vrai requete preparer
   $statement = $pdo->prepare($sql);
   //bindvalue
   $statement->bindValue(':id', $id, FILTER_VALIDATE_INT);//PR L'UPDATE - FILTER_VALIDATE_INT est utilisé pour valider la valeur en nombre entier
   //execution
   $statement->execute();
   //fetchall
   $results = $statement->fetch(); //pas de fetchAll puisqu'on ne veut récup qu'un article
   //fermer la connexion
   $pdo = null;
   //renvoyer les donnees
   return $results;
}

// function date_debut($date) {
//    $pdo = connectDB();
//    date_default_timezone_set('Europe/Paris'); 
//    $date = date('Y-m-d H:i:s');
// }

function update_article($id, $titre, $commentaire) {
   /*echo $id;
   echo "<br>".$titre;
   echo "<br>".$commentaire;
   die();*/
   $pdo = connectDB();
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //preparer une requete update au format texte
   //$sql ="UPDATE article  SET titre=' ".$titre." ', commentaire=' ".$commentaire." ' WHERE id=:id; ";
   $sql ="UPDATE article  SET titre=' ".$titre." ', commentaire=' ".$commentaire." ' WHERE id=:id; ";
   $statement = $pdo->prepare($sql);
   $statement->bindValue(':id', $id);
   //$statement->bindValue(':titre', $titre); // je n'utilise pas le titre dc pas besoin de le mettre
   //$statement->bindValue(':commentaire', $commentaire); //idem commentaire
   $statement->execute();
}


function transfert() {
    $pdo = connectDB();
    /* Vérification de la connexion */ 
if (!$pdo) { 
    echo "Échec de la connexion : ".mysqli_connect_error(); 
    exit(); 
 } 
  
 if ($_FILES['photo']['error']) {  
    switch ($_FILES['photo']['error']){  
          case 1: // UPLOAD_ERR_INI_SIZE  
             echo "La taille du fichier est plus grande que la limite autorisée par le serveur (paramètre upload_max_filesize du fichier php.ini).";  
             break;  
          case 2: // UPLOAD_ERR_FORM_SIZE  
             echo "La taille du fichier est plus grande que la limite autorisée par le formulaire (paramètre post_max_size du fichier php.ini)."; 
             break;  
          case 3: // UPLOAD_ERR_PARTIAL  
             echo "L'envoi du fichier a été interrompu pendant le transfert."; 
     
             break;  
          case 4: // UPLOAD_ERR_NO_FILE  
            echo "La taille du fichier que vous avez envoyé est nulle."; 
             break;  
       }  
 }  
 else {  
 //s'il n'y a pas d'erreur alors $_FILES['nom_du_fichier']['error'] 
 //vaut 0  
    echo "Aucune erreur dans le transfert du fichier.<br />"; 
    if ((isset($_FILES['photo']['name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))) { 
       $chemin_destination = 'photos/'; 
       //déplacement du fichier du répertoire temporaire (stocké 
       //par défaut) dans le répertoire de destination 
       move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_destination.$_FILES['photo']['name']); 
       echo "Le fichier ".$_FILES['photo']['name']." a été copié dans le répertoire photos"; 
    } 
    else { 
       echo "Le fichier n'a pas pu être copié dans le répertoire photos."; 
    } 
 } 
  
 $requete = "INSERT INTO article (titre, date, commentaire, photo) VALUES ('".htmlentities(addslashes($_POST['titre']), ENT_QUOTES)."','".date("Y-m-d H:i:s")."','".htmlentities (addslashes($_POST['commentaire']), ENT_QUOTES)."', '".$_FILES['photo']['name']."')"; 
 $resultat = mysqli_query($pdo,$requete); 
 $identifiant = mysqli_insert_id($pdo); 
 /* Fermeture de la connexion */ 
 mysqli_close($pdo); 
  
 if ($identifiant != 0) { 
    echo "<br />Ajout du commentaire réussi.<br /><br />"; 
 } 
 else { 
    echo "<br />Le commentaire n'a pas pu être ajouté.<br /><br />"; 
 } 
}

function get_article() {
    $pdo = connectDB();
   /* Vérification de la connexion */ 
   if (!$pdo) { 
      echo "Échec de la connexion : ".mysqli_connect_error(); 
      exit(); 
   } 
 
   $requete = "SELECT * FROM article ORDER BY Date"; 
   if ($resultat = mysqli_query($pdo,$requete)) { 
      date_default_timezone_set('Europe/Paris'); 
      /* fetch le tableau associatif */ 
      while ($ligne = mysqli_fetch_assoc($resultat)) { 
         $dt_debut = date_create_from_format('Y-m-d H:i:s', $ligne['Date']); 
         echo "<h3>".$ligne['Titre']."</h3>"; 
         echo "<h4>Le ".$dt_debut->format('d/m/Y H:i:s')."</h4>"; 
         echo "<div style='width:400px'>".$ligne['Commentaire']." </div>"; 
         if ($ligne['Photo'] != "") { 
            echo "<img src='photos/".$ligne['Photo']."' width='200px' height='200px'/>"; 
         } 
         echo "<hr />"; 
      } 
   } 

}
// function transfert(){
//     $ret        = false;
//     $img_blob   = '';
//     $img_taille = 0;
//     $img_type   = '';
//     $img_nom    = '';
//     $taille_max = 250000;
//     $ret        = is_uploaded_file($_FILES['photo']['tmp_name']);
    
//     if (!$ret) {
//         echo "Problème de transfert";
//         return false;
//     } else {
//         // Le fichier a bien été reçu
//         $img_taille = $_FILES['photo']['size'];
        
//         if ($img_taille > $taille_max) {
//             echo "Trop gros !";
//             return false;
//         }

//         $img_type = $_FILES['photo']['type'];
//         $img_nom  = $_FILES['photo']['name'];
//         $pdo = connectDB();
//         $img_blob = file_get_contents ($_FILES['photo']['tmp_name']);
//         $req = "INSERT INTO article (" . 
//                                 "img_nom, img_taille, img_type, img_blob " .
//                                 ") VALUES (" .
//                                 "'" . $img_nom . "', " .
//                                 "'" . $img_taille . "', " .
//                                 "'" . $img_type . "', " .
//                                 "'" . addslashes ($img_blob) . "') "; // N'oublions pas d'échapper le contenu
//         $ret = mysql_query ($req) or die (mysql_error ());
//         return true;
//     }
// }
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