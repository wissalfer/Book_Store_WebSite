<?php
//$pdo=new PDO('mysql:host=localhost;port=3306;dbname=bookstore','root', '');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booksstore";


try{
    $pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

}catch(PDOException $e){
    echo "connexion failed".$e->getMessage();

}

?>