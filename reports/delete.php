<?php
include('../config.php');
try {
    $DBH = new PDO("mysql:host=$_SQL_ADDRESS;dbname=$_SQL_DATABASE", $_SQL_USERNAME, $_SQL_PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = " DELETE FROM payment; DELETE FROM orders;";

$DBH->query($sql);

$DBH = null;