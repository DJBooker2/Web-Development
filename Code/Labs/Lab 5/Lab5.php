<!DOCTYPE html>
<html>

<head>
	<style>
		.error {
			color: #FF0000;
		}
	</style>
	<title>
		Lab 3
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
	$name = $nameMSG = $month = $day = $year = $age = "";
	if (isset($_POST["submit"])) {
		$name = validate_input($_POST["name"]);
		$month = validate_input($_POST["month"]);
		$day = validate_input($_POST["date"]);
		$year = validate_input($_POST["year"]);

		// If fields are empty display the name is required
		if (empty($name)) {
			$nameMSG = "Your name is required!";
		}
	}
	?>

	<h1>Birthday Count Down</h1>

	<form method="post" action="<?php echo $_PHP_SELF ?>">
		<p><span class="error">* required field.</span></p>
		Your name please: <input type="text" name="name" value=""><span class="error">*<?php echo $nameMSG; ?>
		</span><br /><br />
		Select the month of your birthday:
		<select name="month">
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
		</select> <br /><br />
		Specify the date of your birthday:
		<input type="text" name="date" value=> <br /><br />
		<!--
<input type="number" name="date" min="1" max="31" value= > <br/><br/>
-->
		<!--
<select name="date">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
</select> <br/><br/>
-->
		Specify the year you were born: <input type="text" name="year" value=""><br /><br />
		<input type=submit name="submit" value="Submit">
	</form>
	<hr />

	<?php
	// Calculate the amount of days until birthday
	$d = strtotime("$month" . " " . "$day" . " " . "$year.");
	$diff = $d - time(); // time() returns the number of seconds form 1970/1/1 to current (now)
	while ($diff < 0) {
		$d = strtotime("+1 year", $d); // Add year so it is always correct
		$diff = $d - time();
	}
	$days = ceil($diff / 60 / 60 / 24); // calculate the days

	// Calculate Age
	$now = date("m.d.y");
	$bday = strtotime("$month" . " " . "$day" . " " . "$year.");
	$age = ceil(($now - $bday) / 60 / 60 / 24 / 365);


	// Output
	if (isset($_POST["submit"])) {
		// If fields are empty display the name is required
		if (empty($name)) {
			$nameMSG = "A name is required!";
		} else
			echo "Your birthday is: " . $month . "/" . $day . "/" . $year . "<br>";
		echo "You are " . $age . " years old<br>";
		echo "There are " . $days . " days until " . date("M/d/Y", $d) . "<br/>";
	}
	?>

	<hr />
	<?php
	CreateCalender($month, $day, $year);
	?>


	<?php
	// Calender function
	function CreateCalender($month, $day, $year)
	{
		// If month is a number
		if (is_int($month)) {
			$d0 = strtotime($month . "/" . $day . "/" . $year);
		} else {
			$d0 = strtotime($month . " " . $day . ", " . $year); // If its spelled
		}

		$str = date("m", $d0) . "/01/" . date("Y", $d0); // Avoid hard coding aka redundancy 
		$d1 = strtotime($str); // 11/01/1975
		echo "Calender for " . date("M \of Y", $d1) . "<br/>"; // Nov of 1975
		// Make Calender
		echo "<table border=1>";

		// Days of calender
		echo "<tr>
	<td>Mon</td>
	<td>Tue</td>
	<td>Wed</td>
	<td>Th</td>
	<td>Fri</td>
	<td>Sat</td>
	<td>Sun</td>
     </tr>";

		// First day of the month
		$startDay = date("w", $d1); // Days in number
		echo "<tr>";
		for ($k = 0; $k < $startDay; $k++) {
			echo "<td>&nbsp</td>";
		}
		$ndays = date("t", $d1); // Total number of days in a month
		for ($i = 0; $i < $ndays; $i++) {
			if ($i + 1 == $day) {
				echo "<td style=background-color:#FF0000>";
			} else
				echo "<td>";
			echo date("d", $d1); // Date
			echo "</td>";
			if (date("w", $d1) == 6) {
				echo "</tr>"; // End week
				// Not last day of the month
				if ($i < $ndays - 1) {
					echo "<tr>";
				}
				echo "<tr>"; // Start new week
			}
			$d1 = strtotime("+1 day", $d1); // update day
		}
		$endDay = date("w", $d1);
		if ($endDay != 0) {
			for ($k = $endDay; $k < 7; $k++) {
				echo "<td>&nbsp</td>";
			}
		}
		echo "<tr/>";
		echo "</table>";
	}
	?>


</body>

</html>