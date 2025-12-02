<?php
    $pdo = new PDO('mysql:host=localhost;dbname=hotel','root','');

    $id = $_GET['id'];
    $sqlState = $pdo->prepare('SELECT * FROM reservation WHERE num=?');
    $sqlState->execute([$id]);
    $produit = $sqlState->fetch(PDO::FETCH_ASSOC);
?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=hotel','root','');

    if(isset($_POST['ajouter'])){
        $visiteur = $_POST['visiteur'];
        $passeport = $_POST['passeport'];
        $telephone = $_POST['telephone'];
        $chanmbre = $_POST['chanmbre'];
        $type = $_POST['type'];
        $arrivee = $_POST['arrivee'];
        $depart = $_POST['depart'];
        $prixnuit = $_POST['prixnuit'];
        $prixtotal = $_POST['prixtotal'];
        $num = $_POST['num'];        

        if(!empty($visiteur)&& !empty($passeport)&& !empty($telephone)&& !empty($chanmbre)&& !empty($type)&& 
        !empty($arrivee)&& !empty($depart)&& !empty($prixnuit)&& !empty($prixtotal)){
            $sqlState = $pdo->prepare('UPDATE reservation SET visiteur=?,passeport=?,tele=?
            ,chambre=?,type=?,arrivee=?,depart=?,prixnuit=?,total=? WHERE num=?');
            $sqlState->execute([$visiteur,$passeport,$telephone,$chanmbre,$type,
            $arrivee,$depart,$prixnuit,$prixtotal,$num]);
            header("location: table.php");

        }
        else{
            echo"fffffffffffff";
        }
    }
    $produits = $pdo->query('SELECT * FROM reservation')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .input-one{
            border-color: aqua;

            justify-content: center;
            

        }
        .input-one input{
            display: flex;
            margin-top: 20px;
            width: 40%;
            text-align: center;
            margin-left: 30% ;
            height: 20px;
            

        }
        .buton-one{
            display: flex;
            margin-left: 40%;
            gap:15%;
            margin-top: 2%;
            
        }
        .buton-one button{
            width: 10%;
            height: 40px;
            color: rgb(29, 29, 29);
            box-shadow: 1px 2px 3px black, 0 0 25px rgb(255, 255, 255), 0 0 5px rgb(242, 255, 0);
            background-color: aqua;

        }
        .buton-one button:hover{
            background-color: rgb(17, 255, 0);
        }

        #depart{
            padding-left:17%;
            width: 23.2%;
        }

    </style>
</head>
<body>
    <form action="" method="post">   
    <div class="container-one">
        <div class="content-one">
            <h1>Reservation</h1>
                <div class="tout">
                    <div class="input-one"><input type="text" id="num" placeholder="num" name="num" value="<?= $produit['num']?>">
                        <input type="text" id="visiteur" placeholder="visiteur" name="visiteur" value="<?= $produit['visiteur']?>">
                        <input type="text" id="passeport" placeholder="passeport" name="passeport" value="<?= $produit['passeport']?>">
                        <input type="text" id="telephone" placeholder="telephone" name="telephone" value="<?= $produit['tele']?>">
                        <input type="text" id="chanmbre" placeholder="chanmbre" name="chanmbre" value="<?= $produit['chambre']?>">
                        <input type="text" id="type" placeholder="type" name="type" value="<?= $produit['type']?>">
                        <input type="date" id="depart" placeholder="arrivee" name="arrivee" value="<?= $produit['arrivee']?>">
                        <input type="date" id="depart" placeholder="depart" name="depart" value="<?= $produit['depart']?>">
                        <input type="text" id="prixnuit" placeholder="prix de nuit" name="prixnuit" value="<?= $produit['prixnuit']?>">
                        <input type="text" id="prixtotal" placeholder="prix total" name="prixtotal" value="<?= $produit['total']?>">
                        <div class="buton-one">
                            <button name="ajouter">modifier</button>
                            <button name="annuler">Annuler</button>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
    </form>
    <script src="reserjs.js"></script>
</body>
</html>