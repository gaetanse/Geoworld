<?php
require_once 'header.php';
?>

<div class="ui container main">
    <hr>
    <b>Compte User</b> : login & mdpe
    <br>
        <b>Compte Admin</b> : l & p
    <hr>
    <h1>Connexion :</h1>
    <form method="post" action="login.php" class="ui form">
        <div class="field">
            <label>Login</label>
            <input type="text" name="loginuser" placeholder="Entrez un pseudonyme" required>
        </div>
        <div class="field">
            <label>Mot de passe</label>
            <input type="password" name="passworduser" required>
        </div>
        <input type="submit" class="ui button" name="login" value="Valider"/>
    </form>
</div>

<?php

if (isset($_POST['login'])) {

    $loginuser = $_POST['loginuser'];
    $passworduser = $_POST['passworduser'];

    $result = login($loginuser, $passworduser);

    if (login($loginuser, $passworduser)) {
        $_SESSION['id'] = $result['iduser'];
        $_SESSION['nom'] = $result['nom'];
        $_SESSION['prenom'] = $result['prenom'];
        $_SESSION['login'] = $result['loginuser'];
        $_SESSION['mdp'] = $result['passworduser'];
        $_SESSION['date'] = $result['datenaissance'];
        $_SESSION['role'] = $result['su'];

        if ($_SESSION['role'] == 0) {
            ?>
            <script> location.replace("gestion_user.php"); </script>
            <?php
        }
        if ($_SESSION['role'] == 1) {
            ?>
            <script> location.replace("gestion_admin.php"); </script>
            <?php
        }

    } else {
        echo "<br>";
        echo "Mauvais mot de passe";
    }

}
require_once 'footer.php';
?>