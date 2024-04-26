# G2-crud-with-admin

## Administration

- login : admin
- mdp : admin123

## password_hash() and password_verify()

https://onlinephp.io/c/43199

### Exercice 1

Dans `model/ourdatasModel.php` :

```php
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
```

Il faut une redirection si la donnée est insérée vers homepage de l'admin



Dans `view\private\admin.homepage.html.php`, créez le tableau avec les données réelles de la DB

Bonus :

Pouvoir modifier une data en cliquant sur le bouton modifier (! + updateOurdatas).

Pouvoir supprimer une data en cliquant sur le bouton supprimer (! + deleteOurdatas) AVEC une confirmation avant de supprimer réellement.

