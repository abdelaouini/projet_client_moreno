<?php

$login = $_POST['login'];
$mdp   = $_POST['mdp'];

/**
 * validation coté server
 *
 * operateurs logique:
 * et = and -> &&
 * ou = or -> ||
 * vide = empty -> verifier si la valeur est vide
 */

if (empty($login) || empty($mdp)){
    header('Location:  index.php');
}

/**
 * connexion à la base de données
 */
$pdo = new PDO ('mysql:host=localhost;dbname=chez_moreno;charset=utf8', 'root', '' );
/**
 * requete
 */
$query = $pdo->query("SELECT * FROM user WHERE u_mail='".$login."' and u_password='".$mdp."'");
$response = $query->fetchAll();

/**
 * verifier la reponse de notre requete
 */
if (count($response) > 0){
    header('Location:  dashboard.php');
}else{
    header('Location:  index.php');
}




