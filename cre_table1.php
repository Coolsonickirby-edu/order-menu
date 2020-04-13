<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        include("config.php");

        $servername = "localhost";
        $username = $_SQL_USERNAME;
        $password = $_SQL_PASSWORD;
        $database = $_SQL_DATABASE;
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE orders ( order_idint(10) not null auto_increment, payment_idint(10) not null,menuitemvarchar(40),quantityint,primary key (order_id) )";
            $conn->exec($sql);
            echo "Table created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null; 
    ?>
</body>

</html>