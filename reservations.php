<?php
$pdo = new PDO('mysql:host=localhost;dbname=hotel','root','');

    if(isset($_POST['ajouter'])){
        $visiteur = $_POST['visiteur'];
        $chanmbre = $_POST['chanmbre'];
        $type = $_POST['type'];
        $arrivee = $_POST['arrivee'];
        $depart = $_POST['depart'];
        $prixnuit = $_POST['prixnuit'];
        $prixtotal = $_POST['prixtotal'];

        if(!empty($visiteur)&& !empty($chanmbre)&& !empty($type)&& !empty($arrivee)&& !empty($depart)&& !empty($prixnuit)&& !empty($prixtotal)){
            $sqlState = $pdo->prepare('INSERT INTO `reservation` VALUES(null,?,?,?,?,?,?,?)');
            $sqlState->execute([$visiteur,$chanmbre,$type,$arrivee,$depart,$prixnuit,$prixtotal]);
            header("location: table.php");

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
    

    </style>
</head>
<body>
    <form action="" method="post">   
    <div class="container-one">
        <div class="content-one">
            <h1>Reservation</h1>
                <div class="tout">
                    <div class="input-one">
                        <input type="text" id="visiteur" placeholder="visiteur" name="visiteur" >
                        <!-- <input type="text" id="passeport" placeholder="passeport" name="passeport">
                        <input type="text" id="telephone" placeholder="telephone" name="telephone"> -->
                        
                         <select name="chanmbre" id="chanmbre">
                            <option value="">-- choisir chambre --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                      
                         </select>

                         <select name="type" id="type">
                            <option value="">-- choisir type --</option>
                            <option value="normal">normal</option>
                            <option value="mediom">mediom</option>
                            <option value="vip">vip</option>
                         </select>
                        <input type="date" id="depart" placeholder="arrivee" name="arrivee">
                        <input type="date" id="fin" placeholder="depart" name="depart">
                        <input type="text" id="prixnuit" placeholder="prix de nuit" name="prixnuit" readonly>
                        <input type="text" id="prixtotal" placeholder="prix total" name="prixtotal" readonly>
                        <div class="buton-one">
                            <button name="ajouter">Ajouter</button>
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
    </form>
    <script >
        const type = document.getElementById('type');
        const prixnuit = document.getElementById('prixnuit');
        const prixtotal = document.getElementById('prixtotal');
        const datedepart = document.getElementById("depart");
        const datefin = document.getElementById("fin");
        const tout = {
            normal: 250,
            mediom: 700,
            vip: 1000,
        }

        function total(){
            const depart = new Date(datedepart.value);
            const fin = new Date(datefin.value);
            const prix = tout[type.value];

            if(!isNaN(depart) && !isNaN(fin) && prix > 0){
                const date = fin - depart; 
                const toutdate = date / (1000 * 60 * 60 * 24);
            
            if(toutdate > 0){
                prixnuit.value= prix + "dh";
                prixtotal.value = toutdate * prix + "dh";

            }else{
                prixtotal.value = "0 dh";
            }
            }
            else{
                prixtotal.value = "";
            }
            
        } 
        type.addEventListener("change", total);
        datedepart.addEventListener("change", total);
        datefin.addEventListener("change", total);

    </script>
</body>
</html>