<?php

@include 'config.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Utilisateur</title>
    <link rel="stylesheet" href="style.css">

</head>

<body background="https://wallpaperaccess.com/full/2910358.jpg">

    <div class="container">

        <div class="content">
            <h3>Salut, <span>Utilisateur</span></h3>
            <h1>Bienvenue <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p>c'est la page utilisateur</p>
            <a href="utilisateur.php" class="btn">Aller au plateforme</a>
            <a href="logout.php" class="btn">Déconnexion</a>
        </div>

    </div>

</body>

</html>