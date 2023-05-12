<?php
include "connectDB.php";

if (isset($_GET["id"])){
    $id=$_GET["id"];
    


$sql="DELETE FROM order WHERE OrderID=$id";
$pdo->query($sql);}

header("location: listOrder.php");
exit;
?>