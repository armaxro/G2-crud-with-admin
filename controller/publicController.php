<?php


// si on essaie de se connecter
if(isset($_GET['connect'])){

    // si on clique sur connexion
    if(isset($_POST['username'],$_POST['passwd'])){

        // on met dans une variable la tentative de connexion
        $connection = administratorConnect($connect,$_POST['username'],$_POST['passwd']);


        if($connection === true){
            header("Location: ./");
            die();
        }

    }

    // appel de la vue
    require "../view/public/connect.html.php";
    exit();
}

// si on veut récupérer les données en json (pour JS, Leaflet, OpenStreetMap)
if(isset($_GET['json'])){
    $ourDatas = getAllOurdatas($connect,"ASC");
    echo json_encode($ourDatas);
    exit();
}

// on charge toutes les données
$ourDatas = getAllOurdatas($connect);
// pas encore de données
if(is_string($ourDatas)) $message = $ourDatas;

elseif(isset($ourDatas['error'])) $error = $ourDatas['error'];


// chargement de la vue de l'accueil
require "../view/public/homepage.html.php";