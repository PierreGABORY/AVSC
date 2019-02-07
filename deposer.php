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
  <title>AVSC Déposer mon vélo</title>
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

        <h3 class="text-center form-title">Bonjour, <?php echo $_SESSION['email']; ?></h3><br />
        <h4> - Scanner ce QR code au niveau de l'abri pour dévérouiller la porte </h4>
        <?php $email=$_SESSION['email'];
        $number = rand(1,1000);
        ?>
        <center><img src="QR_code.php?text=deposer <?php echo $email ?> <?php echo $number ?>&size=200&padding=10" alt="QR code"></center>
        <br />
        <form action="index.php" method="post">
        <p>
          <button type="submit" class="btn btn-lg btn-block">Retour</button>
        </p>
        </form>
        <center><a href="logout.php" style="color: red; font-size:16pt">Déconnexion</a></center>

      </div>
    </div>
  </div>
</body>
</html>