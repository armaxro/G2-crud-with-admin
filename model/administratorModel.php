<?php

/*
Connexion de l'administrateur
*/

function administratorConnect(PDO $connectDB, string $login, string $password): bool|string
{
    // récupération de tous les champs de la table administrator quand le username match : 
    $sql= "SELECT * FROM administrator WHERE username = ?";
    $prepare = $connectDB->prepare($sql);
    
    try{
        // on essaye de charger l'utilisateur
        $prepare->execute([$login]);
        // Si l'utilisateur n'existe pas, on s'arrête là
        if($prepare->rowCount()==0) return "Utilisateur inconnu";

        // l'utilisateur existe, on va vérifier son mot de passe
        // récupération des données
        $result = $prepare->fetch();

        // si le mot de passe entré est valide avec le mot de passe dans le base de donnée (créée avec password_hash())
        if(password_verify($password, $result['passwd'])){

            // création de la session valide
            $_SESSION['idadministrator'] = $result['idadministrator'];
            $_SESSION['login'] = $login;
            return true;
        }else{
            return false;
        }

    }catch(Exception $e){
        return $e->getMessage();
    }
    
}

function administratorDisconnect(): void
{

    // Destruction des variables de SESSION (remplacement du tableau    associatif par un tableau vide)
    $_SESSION = [];

    // On met le cookie de session dans le passé, pour le navigateur    le supprime
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalement, on détruit la session
    session_destroy();

    // Redirection (actualisation)
    header("Location: ./");
    exit();

}