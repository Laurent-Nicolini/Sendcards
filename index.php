<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyez des cartes par e-mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/style/style.css">
</head>
<body class="container-fluid">

  <!-- Menu latéral -->
  <div class="row">
    <div class="col d-flex flex-column flex-shrink-0 p-md-3 bg-light" style="width: 5vw; height: 100vh;">
        <a href="/" class="d-flex align-items-center mb-md-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <span class="site_name fs-4 d-none d-sm-block">SendCards</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="hover_menu mt-2">
            <a href="index.php" class="nav-link link-dark">
              <i class="bi bi-house-door"></i>
              Accueil
            </a>
          </li>
          <li class=" hover_menu mt-2">
            <a href="/public/new_card.php" class="nav-link link-dark">
              <i class="bi bi-postcard-heart-fill"></i>
              Envoyez une Carte
            </a>
          </li>
          <li class="hover_menu mt-2">
            <a href="/public/account.php" class="nav-link link-dark">
              <i class="bi bi-person-circle"></i>
              Mon Compte
            </a>
          </li>
          <?php
          if (isset($_SESSION['id_user'])) { ?>
            <li class="hover_menu mt-2">
              <a href="/src/deconnexion.php" class="nav-link link-dark">
                <i class="bi bi-box-arrow-right"></i>
                Deconnexion
              </a>
            </li>
            
          <?php } else { ?>
            <li class="hover_menu mt-2">
              <a href="/public/login.php" class="nav-link link-dark">
              <i class="bi bi-door-open"></i>
                Connectez-vous
              </a>
            </li>
          <?php } ?>
        </ul>
    </div> 
    <!-- fin menu latéral -->

    <!-- Corps du site -->
    <?php
    if (isset($_SESSION['id_user'])) { ?>
      <div class="col-10 col-sm-9 col-md-10">
        <h2 class="d-block d-sm-none text-center">SendCards</h2>
        <h3 class="text-center mt-3">Dernières Cartes envoyées</h3>
        
      </div>
    <?php } else {?>
      <div class="col-10 col-sm-9 col-md-10">
        <h2 class="d-block d-sm-none text-center">SendCards</h2>
        <p class="text-center mt-5"><a href="/public/login.php">Connectez-vous</a> pour envoyer une carte par e-mail</p>
      
      </div>
      <?php } ?>
  </div>
  <!-- fin corps du site -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>