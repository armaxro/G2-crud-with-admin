<?php

// si on essaye de se déconnecter (administratorDisconnect nous redirige vers l'accueil)
if(isset($_GET['disconnect'])) administratorDisconnect();

// modification
if(isset($_GET['update'])&&ctype_digit($_GET['update'])){

    $id = (int) $_GET['update'];

    // si le formulaire est envoyé
    if(isset(
        $_POST['idourdatas'],
        $_POST['title'],
        $_POST['ourdesc'],
        $_POST['latitude'],
        $_POST['longitude']
    )){
        $idourdatas = (int) $_POST['idourdatas'];
        $title = htmlspecialchars(strip_tags(trim($_POST['title'])),ENT_QUOTES);
        $ourdesc = htmlspecialchars(trim($_POST['ourdesc']),ENT_QUOTES);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];
<<<<<<< HEAD
        $update = updateOurdatasByID($connect, $idourdatas, $title, $ourdesc, $latitude, $longitude);
=======
        $update = updateOurdatasByID($connect,$idourdatas,$title,$ourdesc,$latitude,$longitude);
        if($update===true){
            // redirection
            header("Location: ./");
            die;
        }
        //var_dump($update);
>>>>>>> d124f8efa7a9bf6924ef069db4e3190ebee4e6e6
    }
    
    // Appel de la fonction qui charge une donnée par son id
    $update = getOneOurdatasByID($connect,$id);
    //var_dump($update,$_POST);
    // appel de la vue d'update
    require "../view/private/admin.update.html.php";
}

// insertion
if(isset($_GET['insert'])){

    // si le formulaire est envoyé
    if(isset(
        $_POST['title'],
        $_POST['ourdesc'],
        $_POST['latitude'],
        $_POST['longitude']
    )){

        $title = strip_tags(trim($_POST['title']));
        $oudesc = trim($_POST['ourdesc']);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];

        // si on récupère true, à cette fonction, il faut rédiriger vers l'accueil de l'admin, sinon affichage d'une erreur
        $insert = addOurdatas($connect,$title,$oudesc,$latitude,$longitude);

        if($insert===true):
            header("Location: ./?zut"); 
            exit();
        else:
            $error = $insert;
        endif;
    }

    // appel de la vue d'insertion
    require "../view/private/admin.insert.html.php";
    //var_dump($_POST);
    exit();
}

// on charge toutes les données
$ourDatas = getAllOurdatas($connect);



// pas encore de données
if(is_string($ourDatas)) $message = $ourDatas;

elseif(isset($ourDatas['error'])) $error = $ourDatas['error'];

// chargement de la vue de l'accueil de l'administration
require "../view/private/admin.homepage.html.php";