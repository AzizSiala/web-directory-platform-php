<?php

@include 'config.php';

if (isset($_POST['submit'])) {

    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $dep = $_POST['dep'];
    $numtel = $_POST['numtel'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $societe = $_POST['company'];
    $site = $_POST['site'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $cpass = $_POST['cpass'];
    $select = "SELECT * FROM users WHERE nom = '$nom'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'utilisateur existe deja';
    } else {

        if ($mot_de_passe != $cpass) {
            $error[] = 'mot de passe incorrecte';
        } else {
            $insert = "INSERT INTO attente (nom,prenom,dep,numtel,email,societe,mot_de_passe) VALUES('$nom','$prenom','$dep','$numtel','$email','$societe','$mot_de_passe')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire d'inscription</title>
    <link rel="stylesheet" href="style.css">

</head>

<body background="https://wallpaperaccess.com/full/2910358.jpg">

    <div class="form-container">

        <form action="" method="post">
            <h3>S'inscrire maintenant</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            }
            $dep = "";
            ?>
            <input type="text" name="nom" required placeholder="nom">
            <input type="text" name="prenom" required placeholder="prénom">
            <label class="col-sm-3 col-form-label">Sélectionnez un département</label>
            <select class="form-select" name="dep">
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
            <input type="text" name="numtel" required placeholder="numéro du téléphone">
            <input type="email" name="email" required placeholder="Email">
            <label for="company">Sélectionnez une entreprise :</label>
            <select name="company" id="company">
                <option value="">Sélectionnez une entreprise :</option>
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
            <label for="site">Sélectionnez un site :</label>
            <select name="site" id="site">
                <option value="">Sélectionnez un site :</option>
            </select>

            <script src="script.js"></script>
            <input type="password" name="mot_de_passe" required placeholder="Enter your password">
            <input type="password" name="cpass" required placeholder="Confirm your password">

            <input type="submit" name="submit" value="S'inscrire maintenant" class="form-btn">
            <p>Vous avez déjà un compte? <a href="login.php">Connectez maintenant</a></p>
        </form>
    </div>

</body>

</html>