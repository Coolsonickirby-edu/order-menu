<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Finder</title>
    <style>
        * {
            font-family: 'Arial';
        }
    </style>
</head>

<body>
    <h1 id="text">Find a Day of the Week Date Loop</h1>
    <form action="./date2.php" method="GET">
        <table>
            <tr>
                <td><label for="mm">Enter Month (MM):</label></td>
                <td><input type="text" name="mm" id="mm"></td>
            </tr>
            <tr>
                <td><label for="dd">Enter Day (DD):</label></td>
                <td><input type="text" name="dd" id="dd"></td>
            </tr>
            <tr>
                <td><label for="yyyyStart">Enter Start Year (YYYY):</label></td>
                <td><input type="text" name="yyyyStart" id="yyyyStart"></td>
            </tr>
            <tr>
                <td><label for="yyyyEnd">Enter End Year (YYYY):</label></td>
                <td><input type="text" name="yyyyEnd" id="yyyyEnd"></td>
            </tr>
        </table>

        <input type="submit">
    </form>

</body>

</html>