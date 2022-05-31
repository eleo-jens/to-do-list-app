<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "to_do";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    // echo "Connected !";
}
catch(PDOException $e){
    echo "Connection failed : " .$e->getMessage();
}
?>