<?php
// ouverture / continuation de session
session_start();

// chargement du fichier de configuration
require_once '../config.php';
// chargement de dépendances
require_once "../model/administratorModel.php";
require_once "../model/ourdatasModel.php";


// Connexion
try{
    $connect = new PDO(
        DB_DRIVER.":host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_LOGIN,
        DB_MDP,
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
);
}catch(Exception $e){
    die($e->getMessage());
}

// si on est connecté (existance d'une variable de session attendue)
if(isset($_SESSION['login'])){
    // chargement du contrôleur privé
    require_once "../controller/privateController.php";
    
}else{

    // chargement du contrôleur publique
    require_once "../controller/publicController.php";
}

$connect = null;