<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "db";
    $username = "stage";
    $password = "password";
    $database = "stage";

    // Creation de la connection 
    $connection = new mysqli($servername, $username, $password, $database);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    // effacer de la base de données
    $deleteSql = "DELETE FROM archive WHERE id=$id";
    $connection->query($deleteSql);

    $connection->close();
}

header("location: archivage.php");
exit;
