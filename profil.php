<?php require_once 'header.php';
require_once 'inc\connect-db.php';
?>

    <div class="ui container main">

<?php

if(protection_user()){
    echo '<br><center>';
    echo '<font size="50" color="red">';
    echo 'Connectez vous en User !!';
    echo '</font></center>';
}
else{
    ?>


        <h1>Voici votre profil</h1><br>
        <h3>Mes informations :</h3><br>
        Nom :<br>
        Prénom :<br>
        Login :<br>
        Date de naissance :<br>
        <h3>Modification des informations :</h3><br>
        <form method="post" action="profil.php" class="ui form">
            Nom : <input type="text" name="nom"><br>
            Prénom : <input type="text" name="prenom"><br>
            Login : <input type="text" name="loginuser"><br><br>
            <input type="submit" class="ui button" name="envoyerphp" value="Valider"/>
        </form>
        <h3>Réinitialiser le mot de passe :</h3>
        <form method="post" action="profil.php" class="ui form">
            Entrez votre mot de passe : <input type="password" name="passworduser" required><br>
            Entrez à nouveau votre mot de passe : <input type="password" name="passworduser" required><br>
            Nouveau mot de passe : <input type="password" name="passworduser" required><br><br>
            <input type="submit" class="ui button" name="envoyerphp" value="Valider"/>
        </form>
    </div>

<?php
}

?>