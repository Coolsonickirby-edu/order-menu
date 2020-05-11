<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Results</title>
</head>

<body>
    <?php
    $day = substr(filter_input(INPUT_GET, 'dd', FILTER_SANITIZE_NUMBER_INT), 0, 2);
    $month = substr(filter_input(INPUT_GET, 'mm', FILTER_SANITIZE_NUMBER_INT), 0, 2);
    $startYear = substr(filter_input(INPUT_GET, 'yyyyStart', FILTER_SANITIZE_NUMBER_INT), 0, 4);
    $endYear = substr(filter_input(INPUT_GET, 'yyyyEnd', FILTER_SANITIZE_NUMBER_INT), 0, 4);

    while($startYear < $endYear){
        $date = "${startYear}-{$month}-{$day}";

        $dayOfWeek = date("l", strtotime($date));

        echo "<p>${month}/{$day}/{$startYear} was/is a {$dayOfWeek}</p>";
        $startYear++;
    }
    

    ?>
</body>

</html>