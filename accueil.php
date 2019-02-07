<?php include 'controllers/authController.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <title>AVSC Accueil</title>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth login">
        <h3 class="text-center form-title">Abri Vélo</h3>
        <br />
        <?php if (count($errors) > 0): ?>
          <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
            <li>
              <?php echo $error; ?>
            </li>
            <?php endforeach;?>
          </div>
        <?php endif;?>
        <div>  L’objectif du projet est la conception d’un abri vélo
         sécurisé et connecté pour le site polytech afin de permettre
          aux actuels cyclistes et à des personnes qui n’osaient pas
           de venir en vélo sur le campus de la Chantrerie. </div>
        <br /><br />
        <form action="login.php" method="post">
          <div class="form-group">
          <button type="submit" class="btn btn-lg btn-block">Se connecter</button>
          </div>
        </form>
        <form action="signup.php" method="post">
          <br />
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-block">S'inscrire</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>