<!--
    Programmed By: DJ Booker
    June 17, 2021
    This program will demonstrate file saving and writing
-->
<title>Activity-06-15-1</title>
<?php
// Variable to hold the file
$file = "Students-Grades-Info.txt";

// Load file to string
$studentStr = file_get_contents($file);

// Remove any spaces that may occur while reading the file
$studentStr = trim($studentStr);

// Breaks string into segments at a new line
$studentList = explode("\n", $studentStr); // result is a 1D array
foreach ($studentList as $index => $student) {
	$studentInfo[$index] = explode("\t", $student); // the result is a 2D array
}

// Display the 2D array as a table
echo "<table border=1>";
echo "<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Major</th>
			<th>Grade</th>
			<th>IP</th>
		</tr>";

// Display students row by row
foreach ($studentInfo as $index => $student) {
	echo "<tr>";
	echo "<td>" . ($index + 1) . "</td>";
	foreach ($student as $info)
		echo "<td>" . $info . "</td>";
	echo "</tr>";
}
echo "</table>";
echo "Totally " . count($studentInfo) . " rows.<br/>";
?>

<?
// Check number of students in a specific major
echo "<hr/>";
$major = "Security";
$nFound = 0;
foreach ($studentInfo as $student) {
	if ($major == $student[2]) {
		$nFound++;
	}
}
echo "There are totally " . $nFound . " students in the " . $major . "<br/>";
?>

<?php
// Find all students of Digital Media major and having 100 points
echo "<hr/>";
echo "Find all students of Digital Media major and having 100 points<br/>";
$major = "Digital Media";
$nFound = 0;
echo "<table border=1>";
echo "<tr>
		<th>#</th>
		<th>Name</th>
		<th>Email</th>
		<th>Major</th>
		<th>Grade</th>
		<th>IP</th>
	</tr>";

foreach ($studentInfo as $index => $student) {
	if ($major == $student[2] && $student[3] == 100) {
		$nFound++;
		echo "<tr>";
		echo "<td>" . ($index + 1) . "</td>";
		foreach ($student as $info)
			echo "<td>" . $info . "</td>";
		echo "</tr>";
	}
}
echo "</table>";
echo "Totally " . $nFound . " rows.<br/>";
?>

<?php
 // Function to prevent malicious scripts from being run
    function validate_input($input)
    {
        $input = trim($input); //ltrim, rtrim for left and right trim
        $input = htmlspecialchars($input);

        return $input;
    }
    
// Display all students for all majors with graph and percentage
echo "<hr />";
$allMajor = array("Digital Media", "Security", "Software", "Business", "Other");
$allFound = array(0, 0, 0, 0, 0);
foreach($studentInfo as $student)
{
	foreach($allMajor as $index => $major)
	{
		if ($major == $student[2]) {
			$allFound[$index]++;
		}
	}
}
echo "<table>";
	echo "<tr>
		<th>Major</th>
		<th># of Students</th>
		<th>Bar</th>
		<th>Percentage</th>
	</tr>";
	foreach($allMajor as $index => $major)
	{
		$p = $allFound[$index] / count($studentInfo) * 100; // found students divided by all students * 100
		$p = round($p,2); // Round 2 decimal places
		echo "<tr>";
			echo "<td style='text-align:left;'>".$major."</td>";
			echo "<td style='text-align:center;'>".$allFound[$index]."</td>";
			echo "<td><progress max=100 value=".$p."></progress></td>"; // progress bar to show $p percentage
			echo "<td style='text-align:right;'>".$p."%</td>";
		echo "</tr>";
	}
echo "</table>";
?>