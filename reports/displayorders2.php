<?php
include('../config.php');

$id = $_GET["payment_id"];

try {
    $DBH = new PDO("mysql:host=$_SQL_ADDRESS;dbname=$_SQL_DATABASE", $_SQL_USERNAME, $_SQL_PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT id FROM payment WHERE id = {$id}";

$stmt = $DBH->prepare($sql);
$stmt->execute();

echo $stmt;