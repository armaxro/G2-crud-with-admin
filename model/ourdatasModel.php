<?php
// Sélectionnez toutes les données
function getAllOurdatas(PDO $db, $order = "DESC"): array|string
{
    // l'ordre ne peut être que ASC ou DESC
    $order = (in_array($order,['DESC','ASC'],true))? $order: "DESC";
    $sql ="SELECT * FROM ourdatas ORDER BY idourdatas $order;";
    try{
        $query = $db->query($sql);
        if($query->rowCount()===0) return "Pas encore de datas";
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;

    }catch(Exception $e){
        return ['error'=>$e->getMessage()];
    }
}

// récupération d'une data via son ID
function getOneOurdatasByID(PDO $connexion, int $id): array|string
{
    // création de la requête
    $sql = "SELECT * FROM `ourdatas` WHERE `idourdatas` = ? ";
    // préparation de la requête (car entrée utilisateur)
    $prepare = $connexion->prepare($sql);
    try {
        $prepare->execute([$id]);
        if($prepare->rowCount()===0) return "Impossible de modifier cet article";
        $result = $prepare->fetch();
        $prepare->closeCursor();
        return $result;
    } catch (Exception $e) {
        return $e->getMessage();
    }

}

// Modification d'une data via son ID
function updateOurdatasByID(
                            PDO $db,
                            int $idourdatas,
                            string $titre, 
                            string $description, 
                            float $latitude,
                            float $longitude 
                            ) 
        : bool|string
{
    return false;
}


// ajoutez avec une requête préparée la nouvelle data
function addOurdatas(PDO $db, 
                    string $titre, 
                    string $description, 
                    float $latitude,
                    float $longitude
                    ) : bool|string
{
    // création d'une variable contenant la requête SQL préparée avec les ?
    $sql = "INSERT INTO `ourdatas` (`title`, `ourdesc`, `latitude`,`longitude`) 
            VALUES(?,?,?,?);";
    // préparation de la requête
    $prepare = $db->prepare($sql);

    try{
        $prepare->execute([$titre, $description, $latitude, $longitude]);
        $prepare->closeCursor();
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }

    
}