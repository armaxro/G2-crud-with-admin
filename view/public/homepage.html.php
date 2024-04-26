<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Homepage</h1>
    <nav>
        <ul>
            <li><a href="./">Accueil</a></li>
            <li><a href="?connect">Connexion</a>
        </ul>
    </nav>
    <div class="content">
        <h2>Nos datas</h2>
        <?php if(isset($message)): ?>
                <h3><?=$message?></h3>
        <?php elseif(isset($error)): ?>
                <h3 class="error"><?=$error?></h3>
        <?php else: ?>
<table>
            <tr>
                <th>idourdatas</th>
                <th>title</th>
                <th>ourdesc</th>
                <th>latitude</th>
                <th>longitude</th>
            </tr>
                <?php foreach($ourDatas as $item): ?>
                    <tr>
                <td><?=$item['idourdatas']?></td>
                <td><?=$item['title']?></td>
                <td><?=$item['ourdesc']?></td>
                <td><?=$item['latitude']?></td>
                <td><?=$item['longitude']?></td>
            </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>