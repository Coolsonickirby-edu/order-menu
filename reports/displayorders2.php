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
        include('../convert_text.php');

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

        
        // Close database connection
        $DBH = null;

        echo "<table><tr><th>Order ID</th><th>Items</th><th>Quantity</th></tr>";
        foreach ($result as $item) {
            $item_name = TranslateText::convertText($item["menuitem"]);
            echo "<tr><td>{$item["order_id"]}</td><td>{$item_name}</td><td>{$item["quantity"]}</td></tr>";
        }
        
        echo "</table>";
        ?>
        <br>
    </div><br>
</body>

</html>