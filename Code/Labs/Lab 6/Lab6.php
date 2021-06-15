<!--
    Programmed By: DJ Booker
    June 15, 2021
    This program will query a system
-->


<!DOCTYPE html>
<html>

<head>
	<style>
		.error {
			color: #FF0000;
		}
	</style>
	<title>
		Lab 6
	</title>
</head>

<body>
	<?php

	// Function to prevent malicious scripts from being run
	function validate_input($input)
	{
		$input = trim($input); //ltrim, rtrim for left and right trim
		$input = htmlspecialchars($input);

		return $input;
	}

	// Variables
	$search = $searchMSG = $query = "";
	if (isset($_POST["submit"])) {
		$search = validate_input($_POST["search"]);
		$query = validate_input($_POST["query"]);

		// If fields are empty display the name is required
		if (empty($search)) {
			$searchMSG = "Your name is required!";
		}
	}

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
	?>

	<!--<div style="background-color:pink;width:60%;margin:auto;text-align:center;">-->
	<div style="width:60%;margin:auto;">
		<h1>City Info Query System</h1>

		<form method="post" action="<?php echo $_PHP_SELF ?>">
			<p><span class="error">* required field</span></p>

			Query by:
			<select name="query">
				<option value="Name">City</option>
				<option value="Major">State</option>
				<option value="Grade">Income</option>
			</select> <br /><br />

			Type the State, City Name or Income that you want to search: <input type="text" name="search" value=""><span class="error">*
				<?php echo $searchMSG; ?></span><br /><br />
			<input type=submit name=submit value=submit>
		</form>
		<hr />

	</div>
</body>
<hr />
<?php

?>

</html>