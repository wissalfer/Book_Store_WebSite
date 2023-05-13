<?php
include "connectDB.php";

if (isset($_GET["id"])){
    $id=$_GET["id"];

    
    $stmt = $pdo->prepare("DELETE FROM order WHERE OrderID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();}

header("location: listOrder.php");
exit;
?>