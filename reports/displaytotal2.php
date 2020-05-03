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

		<h2 class="blue center">Least 5 Popular Menu Items Sold</h2>

		<?php

		// database login credentials
		include('../config.php');
		include('../convert_text.php');

		$rownum = 0;

		try {
			$DBH = new PDO("mysql:host=$_SQL_ADDRESS;dbname=$_SQL_DATABASE", $_SQL_USERNAME, $_SQL_PASSWORD);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		$query = "SELECT menuitem AS ITEM, sum(quantity) AS QUANTITY FROM orders GROUP BY menuitem order by QUANTITY asc limit 5";
		$stmt = $DBH->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();

		echo "<table class=\"table2 tablectr\">";
		echo "<tr><th>Menu Item</th><th>Quantity Sold</th></tr>";
		foreach ($result as $row) {
			$item_name = TranslateText::convertText($row['ITEM']);
			echo '<tr">';
			echo "<td>" . $item_name . "</td><td>" . $row['QUANTITY'] . "</td>";
			echo "</tr>";
			$rownum++;
		}
		echo "</table>";

		$DBH = null;
		?>
		<br>
	</div>

</body>

</html>