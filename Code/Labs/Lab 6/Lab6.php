<!--
    Programmed By: DJ Booker
    June 15, 2021
    This program will demonstrate 2d arrays
-->

<html>

<head>
	<style>
		.error {
			color: red;
		}
	</style>
	<title>
		Lab 6
	</title>
</head>

<body>
	<?php

	$search = $searchMSG = "";

	function validate_input($input)
	{
		$input = trim($input);
		$input = htmlspecialchars($input);
		return $input;
	}
	if ($_POST["submit"]) {
		$search = validate_input($_POST["search"]);
		if (empty($search))
			$searchMSG = "Search box is required!";
	}

	?>

	<!--<div style="background-color:pink;width:60%;margin:auto;text-align:center;">-->
	<div style="width:60%;margin:auto;">
		<h1>City Info Query System</h1>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<p><span class="error">*required field.</span></p>

			Query by:
			<select name="query">
				<option value="City" <?php if ($query == "City") echo "selected"; ?>>City</option>
				<option value="State" <?php if ($query == "State") echo "selected"; ?>>State</option>
				<option value="Income" <?php if ($query == "Income") echo "selected"; ?>>Income</option>
			</select> <br /><br />

			Type the State, City Name or Income that you want to search: <input type="text" name="search" value="<?php echo $search; ?>">
			<span style="color:red;">*<?php echo $searchMSG; ?></span>
			<br /><br />
			<input type=submit name=submit value=submit>
		</form>
		<hr />


		<?php

		$CitiInfo = array(
			array("New York", "NY", 8008278, 103246, 12345),
			array("Los Angeles", "CA", 3694820, 100000, 12346),
			array("Chicago", "IL", 2896016, 93591, 12347),
			array("Houston", "TX", 1953631, 98174, 12348),
			array("Philadelphia", "PA", 1517550, 91083, 12349),
			array("Phoenix", "AZ", 1321045, 83412, 29874),
			array("San Diego", "CA", 1223400, 99247, 29875),
			array("Dallas", "TX", 1188580, 90111, 29876),
			array("San Antonio", "TX", 1144646, 89925, 29877),
			array("Detroit", "MI", 951270, 80188, 29878)
		);

		$found = 0;
		if ($_POST["submit"]) {
			if (empty($search))
				echo "<br/>";

			else {
				echo "<table border = 1>";
				echo "<tr><td>City</td><td>State</td><td>Population</td><td>Income</td>
       <td>Zipcode</td></tr>";
				foreach ($CitiInfo as $search) {

					if ($_POST["query"] == "City" && $_POST["search"] == $search[0]) {
						foreach ($search as $value)
							echo "<td>" . $value . "</td>";
						$found++;
					} else if ($_POST["query"] == "State" && $_POST["search"] == $search[1]) {
						echo "<tr>";
						foreach ($search as $value)
							echo "<td>" . $value . "</td>";
						$found++;
						echo "<tr>";
					} else if ($_POST["query"] == "Income" && $_POST["search"] <= $search[3]) {
						echo "<tr>";
						foreach ($search as $value)
							echo "<td>" . $value . "</td>";
						$found++;
						echo "</tr>";
					}
				}
				echo "</table>";
				echo "We found " . $found . " results matching your search.</br>";
			}
		}




		?>
	</div>
</body>

</html>