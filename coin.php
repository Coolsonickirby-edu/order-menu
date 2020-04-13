<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin Flip</title>
</head>

<body>
    <?php
    $_FLIP_AMOUNT = 20;

    $total_heads = 0;

    $total_tails = 0;

    echo "<table><tr><th>Flip #</th><th>Result</th><th></th></tr>";


    for ($i = 0; $i < $_FLIP_AMOUNT; $i++) {
        $flip = rand(0,1);
        if ($flip == 0) {
            $total_heads++;
            echo "<tr><td>Flip #{$i}</td><td>Heads</td><td><img src=\"./img/heads.png\" alt=\"heads\"></td></tr>";
        }else{
            $total_tails++;
            echo "<tr><td>Flip #{$i}</td><td>Tails</td><td><img src=\"./img/tails.png\" alt=\"tails\"></td></tr>";
        }
    }

    echo "</table>";

    $heads_percent = round(($total_heads / $_FLIP_AMOUNT) * 100) . '%';
    $tails_percent = round(($total_tails / $_FLIP_AMOUNT) * 100) . '%';

    echo "<p>Number of coins flipped heads: {$total_heads} ({$heads_percent})</p>";
    echo "<p>Number of coins flipped tails: {$total_tails} ({$tails_percent})</p>";
    ?>
</body>

</html>