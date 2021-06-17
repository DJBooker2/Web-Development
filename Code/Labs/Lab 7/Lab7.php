<!--
    Programmed By: DJ Booker
    June 17, 2021
    This program will 
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
		Lab 4
	</title>
</head>

<body>

	<!--<div style="background-color:pink;width:60%;margin:auto;text-align:center;">-->
	<div style="width:60%;margin:auto;">
		<h1>Grade Query System</h1>

		<form method="post" action="<?php echo $_PHP_SELF ?>">
			<p><span class="error">* required field.</span></p>

			Query by:
			<select name="query">
				<option value="Name">Name</option>
				<option value="Major">Major</option>
				<option value="Grade">Grade</option>
			</select> <br /><br />

			Type the Name, Major or Grade that you want to search: <input type="text" name="search" value=""><span class="error">*<?php echo $nameMSG; ?>
			</span><br /><br />
			<input type=submit name=submit value=submit>
		</form>
		<hr />

	</div>
</body>
<?php
if (isset($_POST["submit"])) {

	$file = "Info.txt";
	$studentStr = file_get_contents($file);
	$studentStr = trim($studentStr);
	$studentList = explode("\n", $studentStr);
	$i = 0;

	foreach ($studentList as $index => $line) {
		$studentInfo[$index] = explode("\t", $line);  //$studentInfo as 2D array
	}

	if ($_POST["query"] == "Name")
		$i = 0;
	if ($_POST["query"] == "Major")
		$i = 2;
	if ($_POST["query"] == "Grade")
		$i = 3;

	$found = 0;

	echo "<table border=1>";
	echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Grade</th>
            <th>IP</th>
        </tr>";
	foreach ($studentInfo as $student) {
		if ($student[$i] == $_POST["search"] || $_POST["search"] == "*") {
			$found++;
			echo "<tr>";
			foreach ($student as $info)
				echo "<td>" . $info . "</td>";
			echo "</tr>";
		}
	}

	echo "</table>";
	echo "We found " . $found . " students matching your search.<br/>";
}
?>

</html>