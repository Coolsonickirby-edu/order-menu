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

    $servername = "http://cislinux.hfcc.edu/~ahussain17";
    $username = $_SQL_USERNAME;
    $password = $_SQL_PASSWORD;
    $database = $_SQL_DATABASE;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE payment ( payment_idint(10) 
                not null auto_increment, firstnamevarchar(30),lastnamevarchar(30),phone1varchar(3),
                         phone2varchar(3),phone3varchar(4),emailvarchar(35),cardtypevarchar(20), cardnumbervarchar(20), 
                         zipcodevarchar(5),subtotaldecimal(6,2),taxesdecimal(6,2),discountdecimal(6,2),totaldecimal(6,2),
                         couponcodevarchar(5),orderdatedatetime,
                primary key (payment_id) )";
        $conn->exec($sql);
        echo "Table created successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    ?>
</body>

</html>