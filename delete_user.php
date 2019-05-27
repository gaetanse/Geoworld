<?php
require_once 'inc\connect-db.php';
require_once 'inc\manager-db.php';

global $pdo;
$id = $_GET['iduser'];
$query1 = 'DELETE from utilisateurs WHERE iduser=:user;';
$prep1 = $pdo->prepare($query1);
$prep1->bindValue(':user', $id, PDO::PARAM_STR);
$prep1->execute();
header('Location:gestion_admin.php');
?>