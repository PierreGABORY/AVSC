<?php include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <title>AVSC Choix</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 home-wrapper">

        <!-- Display messages -->
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['type'] ?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['type']);
          ?>
        </div>
        <?php endif;?>

        <center><h3>Bonjour, <?php echo $_SESSION['email']; ?></h3></center>
        <?php if (!$_SESSION['verified']): ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Vous devez verifier votre adresse email !
            Connectez-vous sur votre boîte mail et cliquer sur le
            lien de vérification qui vient de vous être envoyé à
            <strong><?php echo $_SESSION['email']; ?></strong>
          </div>
          <center><a href="logout.php" style="color: red; font-size:16pt">Déconnexion</a></center>
        <?php else: ?>
          <br />

          <form action="" method="post">

          <p>
            <button type="submit" name="deposer" class="btn btn-lg btn-block">Déposer mon vélo</button>
          </p>

          </form>

          <form action="" method="post">

          <p>
            <button type="submit" name="retirer_velo" class="btn btn-lg btn-block">Retirer mon vélo</button>
          </p>

          </form>

          <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
              <?php foreach ($errors as $error): ?>
              <li>
                <?php echo $error; ?>
              </li>
              <?php endforeach;?>
            </div>
          <?php endif;?>
          <?php
          $Nb_velos=mysqli_query($conn,"SELECT Nb_velos FROM Infos WHERE id_infos='1'");
          $resultat=mysqli_fetch_array($Nb_velos);
          $place=40-$resultat['Nb_velos']
          ?>

          <div><center> Il reste <?php echo $place?> places disponibles dans l'abri </center></div>
          <br />
          
          <center><a href="logout.php" style="color: red; font-size:16pt">Déconnexion</a></center>

        <?php endif;?>
      </div>
    </div>
  </div>
</body>
</html>