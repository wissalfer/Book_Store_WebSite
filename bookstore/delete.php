<?php
include "connectDB.php";

if (isset($_GET["id"])){
    $id=$_GET["id"];
    


$sql="DELETE FROM customer WHERE CustomerID=$id";
$pdo->query($sql);}

header("location: list.php");
exit;
?>