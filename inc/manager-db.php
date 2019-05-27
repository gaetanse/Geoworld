<?php
require_once 'connect-db.php';

//pays par continenet
function getCountriesByContinent($continent) {
   global $pdo;
   $query = 'SELECT * FROM Country WHERE Continent = :continent;';
   $prep = $pdo->prepare($query);
   $prep->bindValue(':continent', $continent, PDO::PARAM_STR);
   $prep->execute();
   return $prep->fetchAll();
}

//chercher une ville
function cherchVille($ville) {
    global $pdo;
    $query = 'SELECT * FROM City WHERE Name = :ville;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':ville', $ville, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}

//chercher un pays
function cherchPays($pays) {
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Name = :pays;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':pays', $pays, PDO::PARAM_STR);
    $prep->execute();
    return $prep->fetchAll();
}

//obtenir la capital
function getCapital($capital) {

    global $pdo;
    $query1 = 'SELECT Name FROM city WHERE id = :capital;';
    $prep1 = $pdo->prepare($query1);
    $prep1->bindValue(':capital', $capital, PDO::PARAM_STR);
    $prep1->execute();
    $result = $prep1->fetch(PDO::FETCH_NUM);
    return $result[0];
}

//combler les cases vides
function combler_vide($val)
{
    if ($val == '') {
        return 'N/A';
    }
}

function protection_admin(){

    if (isset($_SESSION['role'])&& ($_SESSION['role']==1)) {
        return 0;
    }else{
        return 1;
    }

}

function protection_user(){

    if (isset($_SESSION['role'])&& ($_SESSION['role']==0)) {
        return 0;
    }else{
        return 1;
    }

}

//return des listes des pays
function getAllCountries() {
   global $pdo;
   $query = 'SELECT * FROM Country;';
   return $pdo->query($query)->fetchAll();
}

function drapeau($capital){

    global $pdo;
    $query1 = 'SELECT Code2 FROM country WHERE name = :capital;';
    $prep1 = $pdo->prepare($query1);
    $prep1->bindValue(':capital', $capital, PDO::PARAM_STR);
    $prep1->execute();
    return $prep1->fetchColumn();

}

function drapeau2($idCountry){
    //select Code2 from country where id = idCountry
    global $pdo;
    $query1 = 'SELECT Code2 FROM country WHERE id = :idCountry;';
    $prep1 = $pdo->prepare($query1);
    $prep1->bindValue(':idCountry', $idCountry, PDO::PARAM_STR);
    $prep1->execute();
    return $prep1->fetchColumn();

}

//return des listes des villes
function getAllCity() {
    global $pdo;
    $query = 'SELECT * FROM City;';
    return $pdo->query($query)->fetchAll();
}

//test login return résultat ou 0
function login($login,$mdp)
{
    global $pdo;
    $query = 'SELECT * FROM utilisateurs WHERE loginuser = :login AND passworduser = :mdp;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':login', $login, PDO::PARAM_STR);
    $prep->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $prep->execute();
    // on vérifie que la requête ne retourne qu'une seule ligne
    if($prep->rowCount() == 1){
        $result = $prep->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    else
        return 0;
}

//Obtenir la liste des utilisateurs
function tabutilisateur() {
    global $pdo;
    $query = 'SELECT * FROM Utilisateurs;';
    return $pdo->query($query)->fetchAll();
}

//mise a jour
function updateSalarieRR($nom,$prenom,$login,$mdp,$id){
    global $pdo;
    $requete = "update utilisateurs set nom=:nom,prenom=:prenom,loginuser=:login,passworduser=:mdp where iduser=:id";
    $prep = $pdo->prepare($requete);
    $prep->bindValue(':id', $id);
    $prep->bindValue(':nom', $nom);
    $prep->bindValue(':prenom', $prenom);
    $prep->bindValue(':login', $login);
    $prep->bindValue(':mdp', $mdp);
    $prep->execute();
}

//exeuter uen requete
function requete($req){
    global $pdo;
    $prep = $pdo->prepare($req);
    $prep->execute();
}