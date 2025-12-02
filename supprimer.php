<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=hotel','root','');
    $sqlState = $pdo->prepare('DELETE FROM reservation WHERE num=?');
    $sqlState->execute([$id]);
    header('location: table.php');
    exit;
}
?>
