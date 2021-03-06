<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="CIS Restaurant, Lunch Menu">
    <meta name="description" content="CIS Restaurant: Lunch Menu">
    <title>CIS Restaurant Menu</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="./report.css">
    <script src="../js/jquery-3.5.0.min.js"></script>

</head>

<body>
    <div id="container">
        <h2 class="blue center">CIS 122 Restaurant - Menu Orders</h2>
        <label for="search">Search: </label>
        <input type="text" id="search">
        <br>
        <br>
        <?php
        // database login credentials
        include('../config.php'); // Establish database connection with PDO
        try {
            $DBH = new PDO("mysql:host=$_SQL_ADDRESS;dbname=$_SQL_DATABASE", $_SQL_USERNAME, $_SQL_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        // Run Query
        $sql = "SELECT * FROM payment";
        $stmt = $DBH->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        echo "<table class=\"table2 tablectr\">";
        echo "<thead><tr><th>Payment No</th><th>Order Date/Time</th><th>Last Name</th><th>First Name</th><th>Phone No</th><th>Email</th><th>Sub-Total</th><th>Taxes</th><th>Discount</th><th>Total</th><th>Details</th></tr></thead>";
        foreach ($result as $row) {
            echo '<tbody id="results"><tr">';
            echo "<td>" . htmlspecialchars($row['payment_id']) . "</td>";
            $newdate = date('m/d/y g:i A', strtotime($row['orderdate']));
            echo "<td>" . $newdate . "</td>";
            echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
            echo "<td>(" . htmlspecialchars($row['phone1']) . ") ";
            echo htmlspecialchars($row['phone2']) . "-";
            echo htmlspecialchars($row['phone3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>$" . htmlspecialchars($row['subtotal']) . "</td>";
            echo "<td>$" . htmlspecialchars($row['taxes']) . "</td>";
            echo "<td>$" . htmlspecialchars($row['discount']) . "</td>";
            echo "<td>$" . htmlspecialchars($row['total']) . "</td>";
            echo "<td><a href=\"displayorders2.php?payment_id=" . htmlspecialchars($row['payment_id']) . "\">Details</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        // Close database connection
        $DBH = null;
        ?>
        <br>
    </div><br>

    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#results tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>