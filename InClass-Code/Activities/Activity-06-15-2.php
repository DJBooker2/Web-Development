<!--
    Programmed By: DJ Booker
    June 15, 2021
    This program will demonstrate 2d arrays
-->

<?php
// Initialize 2D array
$Students = array(
	array("Mike", 22, "Male"),
	array("Jason", 18, "Male"),
	array("Jenny", 25, "Female"),
	array("Megan", 18, "Female")
);

//Display all the info of the 2D array as list
for ($row = 0; $row < count($Students); $row++) {
	echo "<p><b>Students No. " . ($row + 1) . "</b></p>";
	echo "<ul>";
	for ($col = 0; $col < count($Students[$row]); $col++) {
		echo "<li>" . $Students[$row][$col] . "</li>";
	}
	echo "</ul>";
}

// Display names using foreach loop
echo "<hr />";
foreach ($Students as $index => $person) {
	echo "<p><b>Students No. " . ($index + 1) . "</b></p>";
	echo "<ul>";
	foreach ($person as $value)
		echo "<li>" . $value . "</li>";
	echo "</ul>";
}

// Display the 2D array using a table ( BEST WAY!!! )
echo "<hr />";
echo "<table border=1>";
echo "<tr>
		<th>No.</th>
		<th>Name</th>
		<th>Age</th>
		<th>Gender</th>
	</tr>";
foreach ($Students as $row => $person) {
	echo "<tr>";
	echo "<td>" . ($row + 1) . "</td>";
	foreach ($person as $value)
		echo "<td>" . $value . "</td>";
	echo "</tr>";
}
echo "</table>";

?>

<hr />

<?php
$name = "Jenny";
foreach ($Students as $person) {
	if ($name == $person[0]) {
		echo "$name: " . $person[0] . " Age: " . $person[1] . " Gender: " . $person[2] . "<br/>";
	}
}

$Students[50] = array("Jason", 26, "Male");
$name = "Jason";
echo "<hr/>";
$found = 0;
foreach ($Students as $person) {
	if ($name == $person[0]) {
		$found++;
		echo "$name: " . $person[0] . " Age: " . $person[1] . " Gender: " . $person[2] . "<br/>";
	}
}

echo "Totally there are " . $found . " with name: " . $name . " found.<br/>";

echo "<hr />";
// Find youngest person
$found = 0;
$youngest = 200;
foreach ($Students as $person) {
	if ($person[1] < $youngest) {
		$youngest = $person[1];
	}
}
foreach ($Students as $person) {
	if ($person[1] == $youngest) {
		$found++;
		echo "The youngest person: " . $person[0] . " Age: " . $person[1] . " Gender: " . $person[2] . "<br/>";
	}
}

echo "Totally there are " . $found . " students with this youngest age: " . $youngest . " found.<br/>";

$Students[8] = array("Josh", 26, "Male");
$Students[18] = array("Kobe", 26, "Male");
echo "<hr/>";

// Find oldest person
$found = 0;
$oldest = 0;
foreach ($Students as $person) {
	if ($person[1] > $oldest) {
		$oldest = $person[1];
	}
}
foreach ($Students as $person) {
	if ($person[1] == $oldest) {
		$found++;
		echo "The oldest person(s): " . $person[0] . " Age: " . $person[1] . " Gender: " . $person[2] . "<br/>";
	}
}

echo "Totally there are " . $found . " students with this youngest age: " . $oldest . " found.<br/>";

echo "<hr/>";
// Find all male students
$found = 0;
foreach ($Students as $person) {
	if ($person[2] == "Male") {
		$found++;
		echo "The male person: " . $person[0] . " Age: " . $person[1] . " Gender: " . $person[2] . "<br/>";
	}
}

echo "Totally there are " . $found . " male students found.<br/>";

?>