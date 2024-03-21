<?php

$servername = "db";
$username = "stage";
$password = "password";
$database = "stage";

$connection = new mysqli($servername, $username, $password, $database);



$id = "";
$nom = "";
$prenom = "";
$dep = "";
$numtel = "";
$email = "";
$societe = "";
$site = "";
$role = "";
$errorMessage = "";
$succesMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {

        header("Location: index.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: index.php");
        exit;
    }

    $nom = $row["nom"];
    $prenom = $row["prenom"];
    $dep = $row["dep"];
    $numtel = $row["numtel"];
    $email = $row["email"];
    $societe = $row["societe"];
    $site = $row["site"];
    $role = $row["role"];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $dep = $_POST["dep"];
    $numtel = $_POST["numtel"];
    $email = $_POST["email"];
    $societe = $_POST["societe"];
    $site = $_POST["site"];
    $role = $_POST["role"];
    do {
        if (empty($nom) || empty($prenom) || empty($dep) || empty($numtel) || empty($email) || empty($societe) || empty($site) || empty($role)) {
            $errorMessage = "case vide";
            break;
        }

        $sql = "UPDATE users SET nom='$nom', prenom='$prenom', dep='$dep', numtel='$numtel', email='$email', societe='$societe', site='$site', role='$role' WHERE id=$id";

        $result = $connection->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query : " . $connection->error;
            break;
        }

        $succesMessage = "succés de modification";

        header("Location: index.php");
        exit;
    } while (false);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body background="https://wallpaperaccess.com/full/2910358.jpg">
    <div class="container my-5">
        <h2>Modifier client</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom" value="<?php echo $nom ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Prenom :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prenom" value="<?php echo $prenom ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Departement:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dep" value="<?php echo $dep ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">NumTel :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="numtel" value="<?php echo $numtel ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Societe :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="societe" value="<?php echo $societe ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Site:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="site" value="<?php echo $site ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Role:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="role" value="<?php echo $role ?>">
                </div>
            </div>

            <?php

            if (!empty($succesMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6>
                        <div class='alert alert-succes alert-dissmissible fade show' role='alert'>
                            <strong>$succesMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }

            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-warning" href="index.php" role="button">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>