<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="CIS Restaurant, Lunch Menu">
	<meta name="description" content="CIS Restaurant: Lunch Menu">
	<title>CIS Restaurant Menu</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="./report.css">

</head>

<body>

	<div id="container">

		<h3 class="blue center">Total Sales by Month/Year</h3>

		<?php

		// database login credentials
		include('../config.php');

		$rownum = 0;

		try {
			$DBH = new PDO("mysql:host=$_SQL_ADDRESS;dbname=$_SQL_DATABASE", $_SQL_USERNAME, $_SQL_PASSWORD);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		$query = "SELECT MONTHNAME(orderdate) AS MONTH, YEAR(orderdate) AS YEAR, sum(total) AS TOTAL FROM payment GROUP BY YEAR(orderdate), MONTH(orderdate)";
		$stmt = $DBH->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();



		echo "<table class=\"table2 tablectr\">";
		echo "<tr><th>Month</th><th>Total Sales</th></tr>";
		foreach ($result as $row) {
			echo '<tr">';
			echo "<td>" . $row['MONTH'] . " " . $row['YEAR'] . "</td><td>$" . $row['TOTAL'] . "</td>";
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