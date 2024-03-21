<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body background="https://wallpaperaccess.com/full/2910358.jpg">
    <div class="container my-5">
        <h2>
            Liste des employers
        </h2>
        <form action="" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="recherche" placeholder="Rechercher un employer">
                <button type="submit" class="btn btn-warning">Rechercher</button>
            </div>
        </form>
        <br>
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
                    <th>Role</th>

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
                // Recherche des clients en fonction du nom saisi dans la barre de recherche
                $recherche = "";
                if (isset($_GET['recherche'])) {
                    $recherche = $_GET['recherche'];
                }
                $sql = "SELECT * FROM users";

                if (!empty($recherche)) {
                    $sql .= " WHERE nom LIKE '%$recherche%'
                              OR prenom LIKE '%$recherche%'
                              OR email LIKE '%$recherche%'
                              OR numtel LIKE '%$recherche%'
                              OR societe LIKE '%$recherche%'";
                }

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
                    <td>$row[role]</td>
                  
                </tr>";
                }

                ?>

            </tbody>
        </table>
    </div>
</body>

</html>