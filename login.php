<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous à Sendcards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <header>
        <img class="position-relative" src="/img/logo_sendcards.png" alt="Logo SendCards" width="100px" height="120px">
        <h1 class="text-center">SendCards</h1>
        <h5 class="text-center mt-4">Connectez-vous ou inscrivez-vous afin de pouvoir envoyer une carte</h5>

        <!-- *** Message d'erreur si connexion impossible *** -->
        <?php
        if (isset($_SESSION['error'])){ 
            if ($_SESSION['error'] === 1) {?>
            <div class="error bg-danger text-center text-white">
                Connexion impossible, veuillez rentrer un identifiant et un mot de passe correct
            </div>
        <?php session_destroy(); } }?>

    </header>
    <hr class="ms-auto w-50 me-auto my-4">
    <main>
        <div class="container ">
            <div class="row">

                <!-- *** Formulaire pour se connecter *** -->
                <div class="col">
                    <h5 class="text-center">Déjà inscrit ? Connectez-vous avec vos identifiants:</h5>
                    <form class="form-floating" action="../src/connexion_user.php" method="POST">
                        <div class="form-floating mt-3">
                            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="test@exemple.com">
                            <label for="floatingInput">Votre email</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="password">
                            <label for="floatingPassword">Votre mot de passe</label>
                        </div>
                        <button type="submit" class="btn btn-outline-warning mt-3" value="login">Je me connecte</button>
                    </form>

                </div>

                <div class="separation d-md-block d-none col-md-1"></div>
                <div class="separation2 d-block d-md-none col-1"></div>

                <!-- *** Formulaire pour s'inscrire *** -->
                <div class="col">
                    <h5 class="text-center">Nouveau sur SendCards ?</h5>
                    <form class="form-floating" action="../src/create_user.php" method="POST">
                        <div class="form-floating mt-3">
                            <input name="name" type="text" class="form-control" id="floatingInputname" placeholder="my name">
                            <label for="floatingInputname">Votre nom</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input name="email" type="email" class="form-control" id="floatingInput2" placeholder="test@exemple.com">
                            <label for="floatingInput2">Votre email</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input name="password" type="password" class="form-control" id="floatingPassword2" placeholder="password">
                            <label for="floatingPassword2">Votre mot de passe</label>
                        </div>
                        <button type="submit" class="btn btn-outline-warning mt-3" value="login">Créer votre compte</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>