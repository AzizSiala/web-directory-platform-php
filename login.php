<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {


    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mot_de_passe = ($_POST['mot_de_passe']);

    $select = " SELECT * FROM loginn WHERE email = '$email' && mot_de_passe = '$mot_de_passe' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($row['role'] == 'admin') {

            $_SESSION['admin_name'] = $row['email'];
            header('location:page_admin.php');
        } elseif ($row['role'] == 'utilisateur') {

            $_SESSION['user_name'] = $row['email'];
            header('location:page_utilisateur.php');
        }
    } else {
        $error[] = 'email ou mot de passe incorrecte !';
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="style.css">

</head>

<body background="https://wallpaperaccess.com/full/2910358.jpg">

    <div class="form-container">

        <form action="" method="post">
            <h3>Connexion</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="email">
            <input type="password" name="mot_de_passe" required placeholder="mot de passe">
            <input type="submit" name="submit" value="se connecter" class="form-btn">
            <p>créer un compte <a href="inscription.php">S'inscrire maintenant</a></p>
        </form>

    </div>

</body>

</html>