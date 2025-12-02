
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styletwo.css">
    
    <style>
        
        
    </style>
</head>
<body>
<div class="input-two">
    <h1>reservation</h1>
    <button class="return"><a href="reservation-client.php" class="retur">reteurn</a></button>

    <table id="tables">
        <thead>
            <tr>
                <th>num</th>
                <th>visiteur</th>
                <th>nom complet</th>
                <th>numero de telephone</th>
                <th>chanmbre</th>
                <th>type</th>
                <th>arrivee</th>
                <th>depart</th>
                <th>prix de nuit</th>
                <th>prix total</th>
                <th>Action</th>

            </tr>
        </thead>
        <?php
            $pdo = new PDO('mysql:host=localhost;dbname=hotel','root','');
            $produits = $pdo->query('SELECT * FROM reservation')->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <tbody id="table-body">

                <?php 
                    foreach($produits as $produit):
                ?>
                <?php
                    $stmt = $pdo->prepare("SELECT * FROM client WHERE id = ?");
                    $stmt->execute([$produit['num']]);
                    $clients = $stmt->fetch(PDO::FETCH_ASSOC);
  
                ?>
                    <tr>
                        <td style="background-color:  rgba(224, 255, 206, 1);"><?= $produit['num'] ?></td>
                        <td><?= $produit['visiteur'] ?></td>        
                        <td><?= $clients ? $clients['nom'] . ' ' . $clients['prenom'] : '' ?></td>
                        <td><?= $clients ? $clients['telephone'] : '' ?></td>
                        <td><?= $produit['chambre'] ?></td>
                        <td><?= $produit['type'] ?></td>
                        <td><?= $produit['arrivee'] ?></td>
                        <td><?= $produit['depart'] ?></td>
                        <td><?= $produit['prixnuit'] ?></td>
                        <td><?= $produit['total'] ?></td>
                        <td><a href="supprimer.php?id=<?= $produit['num']?>" class="supp">Supprimer</a>
                        <a href="modifier.php?id=<?= $produit['num']?>" class="supp">Modifier</a></td>
                    
                        
                    </tr>
        <?php endforeach; ?>
        </tbody>
        
    </table>
</div>
</body>
</html>