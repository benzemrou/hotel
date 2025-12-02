<?php
$pdo = new PDO('mysql:host=localhost;dbname=hotel','root','');

    if(isset($_POST['ajouter'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $cin = $_POST['cin'];
        $adresse = $_POST['adresse'];


        if(!empty($nom)&& !empty($prenom)&& !empty($telephone)&& !empty($cin)&& !empty($adresse)){
            $sqlState = $pdo->prepare('INSERT INTO `client` VALUES(null,?,?,?,?,?)');
            $sqlState->execute([$nom,$prenom,$telephone,$cin,$adresse,]);
            header("location: reservations.php");

        }
        else{
            echo 'error';

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
        *{
            box-sizing:border-box;
        }
        h1{
            text-align: center;
        }
        .input-one{
            border-color: aqua;

            /* background-color: red; */
            
            width: 40%;
        
        }
        .tout{
            display: flex;
            justify-content: center;
        }
        .input-one input{
            display: flex;
            margin-top: 20px;
            width: 100%;
            text-align: center;
            
            height: 20px;
            
        
        }
        #chanmbre{
            display: flex;
            margin-top: 20px;
            width: 100%;
            text-align: center;
            
            height: 20px;
        }
        #type{
            display: flex;
            margin-top: 20px;
            width: 100%;
            text-align: center;
            
            height: 20px;
        }
        .buton-one{
            display: flex;
            margin-left: 33%;
            gap:15%;
            margin-top: 4%;
            
        }
        .buton-one button{
            width: 50%;
            height: 40px;
            color: rgb(29, 29, 29);
            box-shadow: 1px 2px 3px black, 0 0 25px rgb(255, 255, 255), 0 0 5px rgb(242, 255, 0);
            background-color: aqua;

        }
        .buton-one button:hover{
            background-color: rgb(17, 255, 0);
        }

        #depart{
            
            padding-left:40%;
        }
        #fin{
            
            padding-left:40%;
        }
        #file-cart{
            margin-left:40%;
        }
    

    </style>
</head>
<body>
    <form action="" method="post">   
    <div class="container-one">
        <div class="content-one">
            <h1>Reservation</h1>
                <div class="tout">
                    <div class="input-one">
                        <input type="text" id="visiteur" placeholder="nom" name="nom" >
                        <input type="text" id="passeport" placeholder="prenome" name="prenom">
                        <input type="tele" id="telephone" placeholder="telephone" name="telephone">
                        <input type="text" id="telephone" placeholder="Num passeport / CIN" name="cin">
                        <input type="text" id="telephone" placeholder="adresse" name="adresse">
                        <!-- <input type="file" id="file-cart" placeholder="adresse" name="adresse"> -->

                       
                        <div class="buton-one">
                            <button name="ajouter">Ajouter</button>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
    </form>
    <script src="reserjs.js"> 
    </script>
</body>
</html>