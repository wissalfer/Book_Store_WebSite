<?php
include "connectDB.php";

if (isset($_GET["id"])){
    $id=$_GET["id"];
    


$sql="DELETE FROM book WHERE BookID=$id";
$pdo->query($sql);}

header("location: listeBooks.php");
exit;
?>