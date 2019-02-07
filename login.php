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
  <title>AVSC connexion</title>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth login">
        <h3 class="text-center form-title">Connexion</h3>
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
        
        <form action="login.php" method="post">
          <div class="form-group">
            <label>Mail universitaire</label>
            <input type="text" name="mail" class="form-control form-control-lg" value="<?php echo $email; ?>">
          </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <br />
          <div class="form-group">
            <button type="submit" name="login-btn" class="btn btn-lg btn-block">Se connecter</button>
          </div>
        </form>
        <br />
        <p>Pas encore de compte ? <a href="signup.php">S'inscrire</a></p>
      </div>
    </div>
  </div>
</body>
</html>