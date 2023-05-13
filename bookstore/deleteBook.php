<?php
include "connectDB.php";

/*if (isset($_GET["id"])){
    $id=$_GET["id"];
    


$sql="DELETE FROM book WHERE BookID=$id";
$pdo->query($sql);*/

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $stmt = $pdo->prepare("DELETE FROM book WHERE BookID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}





header("location: listeBooks.php");
exit;
?>