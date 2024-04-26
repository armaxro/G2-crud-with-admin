<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
</head>
<body>
    <h1>Admin Homepage</h1>
    <nav>
        <ul>
            <li><a href="./">Accueil Admin</a></li>
            <li><a href="?insert">Ajouter une data</a></li>
            <li><a href="?disconnect">Déconnexion</a>
            
        </ul>
    </nav>
    <div class="content">
        <h2>Administration de nos datas</h2>
        <?php if(isset($_GET['zut'])): ?>

            <h2>Insertion réussie</h2>
            
        <?php endif ?>

        <?php  if(isset($message)): ?>
                <h3><?=$message?></h3>
        <?php elseif(isset($error)): ?>
                <h3 class="error"><?=$error?></h3>
        
        <?php else: ?>
            <!-- modèle de tableau à remplir avec le foreach -->
        <table>
            <tr>
                <th>idourdatas</th>
                <th>title</th>
                <th>ourdesc</th>
                <th>latitude</th>
                <th>longitude</th>
                <th>Modifier</th>
                <th>supprimer</th>
            </tr>
                <?php foreach($ourDatas as $item): ?>
                    <tr>
                <td><?=$item['idourdatas']?></td>
                <td><?=$item['title']?></td>
                <td><?=$item['ourdesc']?></td>
                <td><?=$item['latitude']?></td>
                <td><?=$item['longitude']?></td>
                <td><a href="?update=<?=$item['idourdatas']?>"><img src="img/update.png" width="32" height="32" alt="update" /></a></td>
                <td><img src="img/delete.png" width="32" height="32" alt="delete" /></td>
            </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

    </div>
</body>
</html>