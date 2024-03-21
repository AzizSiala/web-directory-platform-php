<?php
                $servername = "db";
                $username = "stage";
                $password = "password";
                $database = "stage";

// create connection 
$connection = new mysqli($servername, $username, $password, $database);

$nom = "";
$prenom = "";
$dep = "";
$numtel = "";
$email = "";
$societe = "";
$site = "";
$role = "";
$mot_de_passe = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $dep = $_POST["dep"];
    $numtel = $_POST["NumTel"];
    $email = $_POST["Email"];
    $societe = $_POST["societe"];
    $site = $_POST["site"];
    $role = $_POST["role"];
    $mot_de_passe = $_POST["mot_de_passe"];
    do {
        if (empty($nom) || empty($prenom) || empty($email) || empty($site) || empty($numtel) || empty($societe)) {
            $errorMessage = "Champ vide";
        }
        // add new client to the database
        $sql = "INSERT INTO users (nom, prenom, dep, numtel, email, societe,site, role) VALUES ('$nom', '$prenom', '$dep', '$numtel', '$email', '$societe','$site','$role')";
        $result = $connection->query($sql);
        $sql = "INSERT INTO loginn (nom, email,mot_de_passe, role) VALUES ('$nom','$email','$mot_de_passe', '$role')";
        $result = $connection->query($sql);
        if (!$result) {
            $errorMessage = "Invalid query : " . $connection->error;
            break;
        }
        $successMessage = "Client ajouter correctement";
        header("Location:index.php");
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body background="https://wallpaperaccess.com/full/2910358.jpg">
    <div class="container my-5">
        <h2>Nouvel employé</h2>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Nom" value="<?php echo $nom ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Prenom :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Prenom" value="<?php echo $prenom ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Departement:</label>
                <div class="col-sm-6">

                    <select class="form-select" name="dep">
                        <option value="">Sélectionnez un département </option>
                        <option value="Commercial" <?php echo $dep === 'Commercial' ? 'selected' : ''; ?>>Commercial</option>
                        <option value="Achat" <?php echo $dep === 'Achat' ? 'selected' : ''; ?>>Achat</option>
                        <option value="Info" <?php echo $dep === 'Info' ? 'selected' : ''; ?>>Info</option>
                        <option value="Stockage" <?php echo $dep === 'Stockage' ? 'selected' : ''; ?>>Stockage</option>
                        <option value="Energy Solution" <?php echo $dep === 'Energy Solution' ? 'selected' : ''; ?>>Energy Solution</option>
                        <option value="Flotte" <?php echo $dep === 'Flotte' ? 'selected' : ''; ?>>Flotte</option>
                        <option value="RH" <?php echo $dep === 'RH' ? 'selected' : ''; ?>>RH</option>
                        <option value="Direction" <?php echo $dep === 'Direction' ? 'selected' : ''; ?>>Direction</option>
                        <option value="Marketing" <?php echo $dep === 'Marketing' ? 'selected' : ''; ?>>Marketing</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">NumTel :</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="NumTel" value="<?php echo $numtel ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Email" value="<?php echo $email ?>">
                </div>
            </div>


            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Societe :</label>
                <div class="col-sm-6">

                    <select class="form-select" name="company" id="company">
                        <option value="">Sélectionnez une entreprise </option>
                        <option value="SCPC">SCPC</option>
                        <option value="Sodimac">Sodimac</option>
                        <option value="Sofap">Sofap</option>
                        <option value="STHL">STHL</option>
                        <option value="Sofcasud">Sofcasud</option>
                        <option value="EMS">EMS</option>
                        <option value="TMS">TMS</option>
                        <option value="SIT_Hammamet">SIT Hammamet</option>
                        <option value="Hannabal_immobilier">Hannabal immobilier</option>
                        <option value="CHD">CHD</option>
                        <option value="TGM">TGM</option>
                        <option value="SLCM">SLCM</option>
                        <option value="STMT">STMT</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Site:</label>
                <div class="col-sm-6">


                    <select class="form-select" name="site" id="site">
                        <option value="">Sélectionnez un site </option>
                    </select>

                    <script src="script.js"></script>

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Role:</label>
                <div class="col-sm-6">

                    <select class="form-select" name="role" id="role">
                        <option value="utilisateur">utilisateur</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mot de passe:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="mot_de_passe" minlength="6" value="<?php echo $mot_de_passe ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-warning">Ajouter</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-warning" href="index.php" role="button">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>