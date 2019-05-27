<?php
require_once 'header.php';
require_once 'inc\connect-db.php';
?>
<div class="ui container main">
        <br>
        <h1>Créez vous un compte, dès maintenant :</h1>
    <form method="post" action="#" class="ui form">
        <div class="field">
            <label>Nom</label>
            <input type="text" name="nom" placeholder="Entrez votre nom" required>
        </div>
        <div class="field">
            <label>Prénom</label>
            <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
        </div>
        <div class="field">
            <label>Date de naissance</label>
            <input type="text" name="datenaissance" placeholder="Format : 1998-01-01" id="datepicker" required>
        </div>
        <div class="field">
            <label>Login</label>
            <input type="text" name="loginuser" placeholder="Entrez un pseudonyme" required>
        </div>
        <div class="field">
            <label>Mot de passe</label>
            <input type="password" name="passworduser" required>
        </div>
        <div class="field">
            <label>Email</label>
            <input type="email" name="email" placeholder="Entrez une adresse email" required><br>
        </div>
        <input type="submit" class="ui button" name="envoyerphp" value="Valider"/>
    </form>

    <?php
        if(isset($_POST['envoyerphp'])){
            global $pdo;
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $datenaissance=$_POST['datenaissance'];
            $loginuser=$_POST['loginuser'];
            $passworduser=$_POST['passworduser'];
            $email=$_POST['email'];
            $req = "INSERT into utilisateurs (iduser, nom, prenom, datenaissance, loginuser, passworduser, email, su) 
            VALUES(NULL,'$nom','$prenom','$datenaissance','$loginuser','$passworduser','$email','0')" or die("Erreur de la requete");
            $prep = $pdo->prepare($req);
            $prep->execute();
        }
    ?>

<?php
require_once 'footer.php';
?>