<!--
    Programmed By: DJ Booker
    June 10, 2021
    This program will demonstrate how to display a calender
-->

<?php
//Display calender for the given date
$d0 = strtotime("November 27, 1975");
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
?>

<?php
// Calender function
function CreateCalender($month, $day, $year)
{
	// If month is a number
	if (is_int($month)) {
		$d0 = strtotime($month . "/" . $day . "/" . $year);
	}
	else
	{
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

<?php
	echo "<hr/>";

	// Passing in number
	CreateCalender(4, 23, 2021);

	echo "<hr/>";

	// Passing in String
	CreateCalender("April", 23, 2021);

	echo "<hr/>";

	// Future Calender
	CreateCalender(12, 23, 2032);
?>

<?php
	echo "<hr/>";
	
	// Display calender for while year
	$year = 2022;
	echo "<h1>The calender for year ".$year."</h1>";
	echo "<table border=1>";
		$nrows = 3;
		$ncols = 4;
		for ($i=0; $i < $nrows ; $i++) { 
			echo "<tr>";
				for ($j=0; $j < $ncols ; $j++) { 
					echo "<td style ='vertical-align:top;'>";
						CreateCalender($i*$ncols+$j+1,10,$year);
					echo "</td>";
				}
			echo "</tr>";
		}
	echo "</table>";
?>