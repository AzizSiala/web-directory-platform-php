<?php
@include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approbation de l'administrateur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body background="https://wallpaperaccess.com/full/2910358.jpg">
    <div class="container my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Departement</th>
                    <th>Numéro du Telephone</th>
                    <th>Email</th>
                    <th>Societe</th>
                    <th>Site</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "db";
                $username = "stage";
                $password = "password";
                $database = "stage";
                //create connection 
                $connection = new mysqli($servername, $username, $password, $database);
                if ($connection->connect_error) {
                    die("connection failed : " . $connection->connect_error);
                }

                $sql = "SELECT * FROM attente"; // pour coller les données de la table de base de données au page internet
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query : " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                     <tr>
                     <td>$row[id]</td>
                     <td>$row[nom]</td>
                     <td>$row[prenom]</td>
                     <td>$row[dep]</td>
                     <td>$row[numtel]</td>
                     <td>$row[email]</td>
                     <td>$row[societe]</td>
                     <td>$row[site]</td>
                     <td>
                         <a class='btn btn-success' href='approuver.php?id=$row[id]'>Approuver</a>
                         <a class='btn btn-danger ' href='refuser.php?id=$row[id]'>Refuser</a>
                     </td>
                 </tr>";
                }

                ?>

            </tbody>
            <h1> Liste des demandes</h1>

            </tbody>
        </table>
    </div>
</body>

</html>