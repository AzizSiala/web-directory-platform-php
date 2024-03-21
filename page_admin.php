<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page admin</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>

<body background="https://wallpaperaccess.com/full/2910358.jpg">

    <div class="container">

        <div class="content">
            <h3>Salut, <span>Admin</span></h3>
            <h1>Bienvenue <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <p>c'est la page admin </p>
            <a href="index.php" class="btn">Aller au plateforme</a>
            <a href="attente.php" class="btn">Page d'attente</a>
            <a href="archivage.php" class="btn">Archive</a>
            <a href="logout.php" class="btn">Déconnexion</a>
        </div>

    </div>

</body>

</html>