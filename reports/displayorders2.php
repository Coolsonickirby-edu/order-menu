<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="CIS Restaurant, Lunch Menu">
    <meta name="description" content="CIS Restaurant: Lunch Menu">
    <title>CIS Restaurant Menu</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div id="container">
        <h2 class="blue center">Order Details</h2>
        <?php
        include('../config.php');

        $id = $_GET["payment_id"];

        try {
            $DBH = new PDO("mysql:host=$_SQL_ADDRESS;dbname=$_SQL_DATABASE", $_SQL_USERNAME, $_SQL_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $sql = "SELECT * FROM orders WHERE payment_id={$id}";

        $stmt = $DBH->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $item = $result[0];

        // Close database connection
        $DBH = null;


        $wings = $item["wings"];
        $nachos = $item["nachos"];
        $dip = $item["dip"];
        $quesadilla = $item["quesadilla"];
        $chips = $item["chips"];
        $calamari = $item["calamari"];
        $pastrami = $item["pastrami"];
        $panini = $item["panini"];
        $reuben = $item["reuben"];
        $vegetarian = $item["vegetarian"];
        $turkey = $item["turkey"];
        $shrimp = $item["shrimp"];
        $chickenpasta = $item["chickenpasta"];
        $angelhair = $item["angelhair"];
        $alfredo = $item["alfredo"];
        $couponcode = $item["couponcode"];


        foreach ($item as $i){
            echo "{$i}<br>";
        }


        // echo "<table><tr><th>Items</th><th>Quantity</th></tr>";
        // echo "<tr><td>{$item["lastname"]}</td><td></td></tr>";
        // echo "</table>";
        ?>
        <br>
    </div><br>
</body>

</html>