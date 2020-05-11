<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Creator</title>
    <style>
        * {
            font-family: 'Arial';
        }
    </style>
</head>

<body>
    <h1 id="text">Table Creator</h1>
    <form action="./table2.php" method="GET">
        <table>
            <tr>
                <td><label for="rows">Number of rows:</label></td>
                <td><select name="rows" id="rows">
                    </select></td>
            </tr>
            <tr>
                <td><label for="columns">Number of columns:</label></td>
                <td><select name="columns" id="columns">
                    </select></td>
            </tr>
            <tr>
                <td><label for="color">Alternating row background color:</label></td>
                <td><input type="color" name="color" id="color"></td>
            </tr>
        </table>

        <input type="submit">
    </form>

    <p><strong>Warning:</strong> make sure you have Javascript enabled</p>
    <script>
        const _AMOUNT = 100;

        window.onload = function() {
            for (i = 1; i <= _AMOUNT; i++) {
                document.getElementById("rows").innerHTML += `<option value="${i}">${i}</option>`;
                document.getElementById("columns").innerHTML += `<option value="${i}">${i}</option>`;
            }
            document.getElementById("color").value = "#00000";
            document.getElementById("color").addEventListener("change", function(e) {
                document.getElementById("text").style.color = e.currentTarget.value
            });
        }
    </script>

</body>

</html>