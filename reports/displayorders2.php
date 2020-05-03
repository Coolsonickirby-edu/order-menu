<?php
include('../config.php');

$id = $_GET["payment_id"];

try {
    $DBH = new PDO("mysql:host=$_SQL_ADDRESS;dbname=$_SQL_DATABASE", $_SQL_USERNAME, $_SQL_PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT payment_id FROM payment WHERE payment_id = {$id}";

$stmt = $DBH->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

// Close database connection
$DBH = null;

foreach($result as $item){
    echo $item;
}