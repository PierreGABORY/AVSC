<?php

require_once 'sendEmails.php';

session_start();
$email = "";
$errors = [];

$conn = new mysqli('localhost', 'root', '', 'avsc');

// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email requis';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Mot de passe requis';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'Les deux mots de passe ne correspondent pas';
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $errors['email'] = "Votre adresse mail n'est pas valide";
    }

    list($user,$domaine)=explode("@",$_POST['email'],2); 
    if($domaine!="etu.univ-nantes.fr"){ 
        $errors['email'] = "Ce n'est pas une adresse univ-nantes"; 
    } 

    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email déjà utilisé";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET email=?, token=?, password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $email, $token, $password);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            // TO DO: send verification email to user
            sendVerificationEmail($email, $token);

            $_SESSION['id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'Vous êtes connecté !';
            $_SESSION['type'] = 'alert-success';
            header('location: index.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}

// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['mail'])) {
        $errors['mail'] = 'email requis';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Mot de passe requis';
    }
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $mail);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'Vous êtes connecté !';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Mauvais mail / Mot de passe";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}

// Deposer et retirer
$Nb_velos=mysqli_query($conn,"SELECT Nb_velos FROM Infos WHERE id_infos='1'");
$Place_dispo=mysqli_fetch_array($Nb_velos);
if (isset($_POST['retirer_velo']))
{
    header("Location: retirer.php?id=".$_SESSION['id']);
}
if (isset($_POST['deposer']))
{
    if ($Place_dispo['Nb_velos']<'40'){
            header("Location: deposer.php?id=".$_SESSION['id']);
        }
    else{
        $errors['Plus_de_place'] = "Plus de place dans l'abri";
    }
    
}
