<?php
require_once 'header.php';
require_once 'inc\connect-db.php'
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

    <h1>Voici votre profil</h1><hr>
    <h3>Mes informations :</h3><br>
    Nom : <?php echo $_SESSION['nom']; ?><br>
    Prénom : <?php echo $_SESSION['prenom']; ?><br>
    Login : <?php echo $_SESSION['login']; ?><br>
    Date de naissance : <?php echo $_SESSION['date']; ?><br>
    Mot de passe : <?php echo $_SESSION['mdp']; ?><br><br><hr>
    <h3>Modification des informations :</h3><br>
    <form method="post" action="#" class="ui form">
        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
        Nom : <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>"><br>
        Prénom : <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>"><br>
        Login : <input type="text" name="loginuser" value="<?php echo $_SESSION['login']; ?>"><br>
        Mdp : <input type="text" name="passworduser" value="<?php echo $_SESSION['mdp']; ?>"><br> <br>
        <input type="submit" class="ui button" name="modif" value="Mise a jour"/>
    </form>
</div>

<?php

if (isset($_POST['modif'])) {
    $nom=$_POST['nom'];
    $id=$_POST['id'];
    $prenom=$_POST['prenom'];
    $login=$_POST['loginuser'];
    $mdp=$_POST['passworduser'];
    updateSalarieRR($nom,$prenom,$login,$mdp,$id);
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['login'] = $login;
    $_SESSION['mdp'] = $mdp;
    ?>
    <script> location.replace("gestion_user.php"); </script>
    <?php
}

?>

    <?php
}
    ?>

<?php
require_once 'footer.php';
?>


