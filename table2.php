<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Results</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 3px solid black;
        }
    </style>
</head>

<body>
    <?php
    $rows = substr(filter_input(INPUT_GET, 'rows', FILTER_SANITIZE_NUMBER_INT), 0, 3);
    $columns = substr(filter_input(INPUT_GET, 'columns', FILTER_SANITIZE_NUMBER_INT), 0, 3);
    $color = substr(filter_input(INPUT_GET, 'color', FILTER_SANITIZE_STRING), 0, 10);

    echo "<table>";
    for ($i = 1; $i < $columns; $i++) {
        if ($i % 2 == 0) {
            echo "<tr style=\"background-color: {$color}\">";
        } else {
            echo "<tr>";
        }
        for ($x = 1; $x < $rows; $x++) {
            echo "<td>Row {$i} Col {$x}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>