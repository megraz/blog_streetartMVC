<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card text-white bg-secondary mb-3"> <!--card text-white bg-dark mb-3 prend la mm couleur que le header-->
                <h4 class="card-header">Connexion</h4>
                <div class="card-body">
                    <form method="POST" action="../controllers/processFormController.php"><!--A changer-->
                        <input type="hidden" name="_token" value="ufHCmMnuP8DJMD0zOq73bFvboi9eZUCrCmd1Oqvv"><!--vérif les token-->
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input id="email" type="email" class="form-control" name="email" value="" required>
                        </div>            
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input id="password" type="password" class="form-control" name="password" value="" required>
                        </div>            
                        <button type="submit" class="btn btn-warning float-right">Connexion</button>        
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>

    
<?php include("footer.php"); ?>
</body>
</html>