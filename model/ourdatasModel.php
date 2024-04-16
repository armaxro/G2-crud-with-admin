<?php
// Sélectionnez toutes les données
function getAllOurdatas(PDO $db): array|string
{
    $sql ="SELECT * FROM ourdatas ORDER BY idourdatas DESC;";
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

// Function to add a new data
function addOurdata(PDO $db, string $title, string $content): bool|string
{
    $sql = "INSERT INTO ourdatas (title, content) VALUES (:title, :content);";
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':title', $title);
        $query->bindParam(':content', $content);
        $query->execute();
        $query->closeCursor();
        return true;
    } catch (Exception $e) {
        return ['error' => $e->getMessage()];
    }
}

// ajoutez avec une requête préparée la nouvelle data
function addOurdatas(PDO $db, 
                    string $titre, 
                    string $description, 
                    float $latitude,
                    float $longitude
                    ) : bool|string
{
    return true;
}