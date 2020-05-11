<?php
include('config.php');

$date = date('Y-m-d H:i:s');

// Get post variables from HTML form
$wings = substr(filter_input(INPUT_POST, 'wings', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$nachos = substr(filter_input(INPUT_POST, 'nachos', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$dip = substr(filter_input(INPUT_POST, 'dip', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$quesadilla = substr(filter_input(INPUT_POST, 'quesadilla', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$chips = substr(filter_input(INPUT_POST, 'chips', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$calamari = substr(filter_input(INPUT_POST, 'calamari', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$pastrami = substr(filter_input(INPUT_POST, 'pastrami', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$panini = substr(filter_input(INPUT_POST, 'panini', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$reuben = substr(filter_input(INPUT_POST, 'reuben', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$vegetarian = substr(filter_input(INPUT_POST, 'vegetarian', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$turkey = substr(filter_input(INPUT_POST, 'turkey', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$shrimp = substr(filter_input(INPUT_POST, 'shrimp', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$chickenpasta = substr(filter_input(INPUT_POST, 'chickenpasta', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$angelhair = substr(filter_input(INPUT_POST, 'angelhair', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$alfredo = substr(filter_input(INPUT_POST, 'alfredo', FILTER_SANITIZE_NUMBER_INT), 0, 2);
$couponcode = substr(filter_input(INPUT_POST, 'couponcode', FILTER_SANITIZE_STRING), 0, 15);


$subtotal = filter_input(INPUT_POST, 'subtotal', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$taxes = filter_input(INPUT_POST, 'taxes', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$discount = filter_input(INPUT_POST, 'discount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$firstname = substr(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING), 0, 30);

$lastname = substr(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING), 0, 30);

$phone1 = substr(filter_input(INPUT_POST, 'phone1', FILTER_SANITIZE_NUMBER_INT), 0, 3);

$phone2 = substr(filter_input(INPUT_POST, 'phone2', FILTER_SANITIZE_NUMBER_INT), 0, 3);

$phone3 = substr(filter_input(INPUT_POST, 'phone3', FILTER_SANITIZE_NUMBER_INT), 0, 4);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$CardType =  substr(filter_input(INPUT_POST, 'CardType', FILTER_SANITIZE_STRING), 0, 5);

$CardNumber =  substr(filter_input(INPUT_POST, 'CardNumber', FILTER_SANITIZE_NUMBER_INT), 0, 20);

$zipcode =  substr(filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT), 0, 6);

// Use of PHP PDO prepared statements to prevent SQL injection
// Insert into payment table

// foreach ($_POST as $key => $value){
//     echo "{$key}: {$value}<br>";
// }


// Establish database connection with PDO
try {
    $DBH = new PDO("mysql:host=$_SQL_ADDRESS;dbname=$_SQL_DATABASE", $_SQL_USERNAME, $_SQL_PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = $DBH->prepare(
    "INSERT INTO payment 
                                    VALUES ('', :firstname, 
                                                :lastname, 
                                                :phone1, 
                                                :phone2, 
                                                :phone3, 
                                                :email, 
                                                :CardType, 
                                                :CardNumber, 
                                                :zipcode, 
                                                :subtotal, 
                                                :taxes, 
                                                :discount, 
                                                :total, 
                                                :couponcode, 
                                                :date)"
);


$sql->execute(
    array(
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':phone1' => $phone1,
        ':phone2' => $phone2,
        ':phone3' => $phone3,
        ':email' => $email,
        ':CardType' => $CardType,
        ':CardNumber' => $CardNumber,
        ':zipcode' => $zipcode,
        ':subtotal' => $subtotal,
        ':taxes' => $taxes,
        ':discount' => $discount,
        ':total' => $total,
        ':couponcode' => $couponcode,
        ':date' => $date
    )
) or die(print_r($sql->errorInfo(), true));


// Get payment_id from newly placed order
$query = $DBH->prepare("SELECT * FROM payment WHERE firstname = :firstname AND lastname = :lastname AND orderdate = :date");
$values = [':firstname' => $firstname, ':lastname' => $lastname, ':date' => $date];
$query->execute($values);
$payments = $query->fetchAll(PDO::FETCH_CLASS, 'StdClass');

foreach ($payments as $payment) {
    $payment_id = $payment->payment_id;
}

if (!empty($_POST['wings'])) {
    insertItem('wings', $DBH, $payment_id);
};
if (!empty($_POST['nachos'])) {
    insertItem('nachos', $DBH, $payment_id);
};
if (!empty($_POST['dip'])) {
    insertItem('dip', $DBH, $payment_id);
};
if (!empty($_POST['quesadilla'])) {
    insertItem('quesadilla', $DBH, $payment_id);
};
if (!empty($_POST['chips'])) {
    insertItem('chips', $DBH, $payment_id);
};
if (!empty($_POST['calamari'])) {
    insertItem('calamari', $DBH, $payment_id);
};
if (!empty($_POST['pastrami'])) {
    insertItem('pastrami', $DBH, $payment_id);
};
if (!empty($_POST['panini'])) {
    insertItem('panini', $DBH, $payment_id);
};
if (!empty($_POST['reuben'])) {
    insertItem('reuben', $DBH, $payment_id);
};
if (!empty($_POST['vegetarian'])) {
    insertItem('vegetarian', $DBH, $payment_id);
};
if (!empty($_POST['turkey'])) {
    insertItem('turkey', $DBH, $payment_id);
};
if (!empty($_POST['shrimp'])) {
    insertItem('shrimp', $DBH, $payment_id);
};
if (!empty($_POST['chickenpasta'])) {
    insertItem('chickenpasta', $DBH, $payment_id);
};
if (!empty($_POST['angelhair'])) {
    insertItem('angelhair', $DBH, $payment_id);
};
if (!empty($_POST['alfredo'])) {
    insertItem('alfredo', $DBH, $payment_id);
};

function insertItem($item, $DBH, $payment_id){
    $sql = $DBH->prepare("INSERT INTO orders VALUES ('', :payment_id, '{$item}', :{$item})");
    $sql->execute(array(':payment_id' => $payment_id, ":{$item}" => $_POST[$item])) or die(print_r($sql->errorInfo(), true));
}

echo "<p>Order successfully placed.</p>";

// Close database connection
$DBH = null;