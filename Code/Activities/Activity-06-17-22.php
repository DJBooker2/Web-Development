<!--
    Programmed By: DJ Booker
    June 17, 2021
    This program will verify the user information
-->

<html>
<title>Query</title>

<body>
	<h1>Query System</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		Please provide your name:<br />

		<input type="text" name="name"><br />
		<input type="submit" name="submit">
	</form>

	<?php
	if (isset($_POST["submit"])) {
		echo "<hr/>";
		$file = "SignUpInfo.txt";
		$InfoStr = file_get_contents($file);
		$InfoStr = trim($InfoStr);
		$InfoList = explode("\n", $InfoStr);
		foreach ($InfoList as $index => $line) {
			$personInfo[$index] = explode("\t", $line); //$personInfo is a 2D array
		}
	}

	$found = 0;
	echo "<table border=1>";
	echo "<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Major</th>
			<th>IP</th>
			<th>Date</th>
			<th>Time</th>
			<th>ID</th>
		</tr>";
	foreach ($personInfo as $people) {
		if ($people[0] == $_POST["name"] || $_POST["name"] == "*") {
			$found++;
			echo "<tr>";
			echo "<td>" . $found . "</td>";
			foreach ($people as $info)
				echo "<td>" . $info . "</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	echo "Totally " . $found . " people found.<br/>";
	?>


</body>

</html>