<!DOCTYPE html>
<html>

<head>
	<title>
		Lab 8
	</title>
</head>

<body>

	<?php
	$file = "AllGrades-lab-query-data.txt";
	$studentStr = file_get_contents($file);

	$studentList = explode("\n", $studentStr); //This is a 1D array
	foreach ($studentList as $index => $student) {
		$studentInfo[$index] = explode("\t", $student); //$studentInfo is a 2D array
	}
	$sortby = $_POST["sortby"];
	?>

	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
		<table style="background-color:pink;margin:auto;" border=0>
			<thead align="center">
				<tr>
					<td colspan="2">Sorting information in different ways<br />

						(Click <a href="http://drlai.altervista.org/ITEC4450/Labs/Lab4-1/AllGrades-lab-query-data.txt">here</a> to see the data)
					</td>
				</tr>
			</thead>
			<tr>
				<td colspan=2>
					<hr />
				</td>
			</tr>
			<tr>
				<td align=right><input type=radio name="sortby" value="byname" <?php if ($sortby == "byname") echo "checked"; ?>></td>
				<td>Sort by name in ascending order </td>
			</tr>
			<tr>
				<td align=right><input type=radio name="sortby" value="byemail" <?php if ($sortby == "byemail") echo "checked"; ?>></td>
				<td>Sort by email in descending order </td>
			</tr>
			<tr>
				<td align=right><input type=radio name="sortby" value="bymajor" <?php if ($sortby == "bymajor") echo "checked"; ?>></td>
				<td>Sort by major in ascending order </td>
			</tr>
			<tr>
				<td align=right><input type=radio name="sortby" value="bygrade" <?php if ($sortby == "bygrade") echo "checked"; ?>></td>
				<td>Sort by grade in descending order </td>
			</tr>
			<tr>
				<td align=right><input type=radio name="sortby" value="byMajorDESCGradeASC" <?php if ($sortby == "byMajorDESCGradeASC") echo "checked"; ?>></td>
				<td>Sort by major in descending then by grade in ascending </td>
			</tr>
			<tr>
				<td align=right><input type=radio name="sortby" value="byGradeDESCNameASC" <?php if ($sortby == "byGradeDESCNameASC") echo "checked"; ?>></td>
				<td>Sort by grade in descending then by major in ascending then by name in ascending
				</td>
			</tr>

			<tr>
				<td colspan=2 align="center"><input name="login" alt="Login" type="submit" value="submit"> </td>
			</tr>

		</table>
	</form>
	<br />

	<?php
	function newCols($m, $n)
	{
		global $studentInfo;
		foreach ($studentInfo as $index => $person) {
			$temp = $studentInfo[$index][$m];
			$studentInfo[$index][$m] = $studentInfo[$index][$n];
			$studentInfo[$index][$n] = $temp;
		}
	}
	function display2D($arr)
	{
		echo "Totally 193 students listed below<br/>";
		echo "<table border=1>";
		echo "<tr><td>Name</td><td>Email</td><td>Major</td><td>Grade</td><td>IP address</td></tr>";
		foreach ($arr as $person) {
			echo "<tr>";
			foreach ($person as $info)
				echo "<td>" . $info . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function byMajorDESCGradeASC($a, $b)
	{

		$index1 = 2;
		$index2 = 3;
		if ($a[$index1] == $b[$index1]) {
			if ($a[$index2] == $b[$index2])
				return 0;

			else if ($a[$index2] > $b[$index2]) return 1;

			else return -1;
		} else if ($a[$index1] > $b[$index1]) return -1;
		else return 1;
	}
	function byGradeDESCNameASC($a, $b)
	{

		$index1 = 3;
		$index2 = 2;
		$index3 = 0;
		if ($a[$index1] == $b[$index1]) {
			if ($a[$index2] == $b[$index2]) {

				if ($a[$index3] == $b[$index3])
					return 0;

				else if ($a[$index3] > $b[$index3]) return 1;
				else return -1;
			} else if ($a[$index2] > $b[$index2]) return 1;

			else return -1;
		} else if ($a[$index1] > $b[$index1]) return -1;
		else return 1;
	}

	if (isset($_POST["login"])) {

		if ($sortby == "byname") {
			//sort ascending
			sort($studentInfo);
			display2D($studentInfo);
		} else if ($sortby == "byemail") {
			//sort descending
			newCols(0, 1);
			rsort($studentInfo);
			newCols(0, 1);
			display2D($studentInfo);
		} else if ($sortby == "bymajor") {
			//sort ascending
			newCols(0, 2);
			sort($studentInfo);
			newCols(0, 2);
			display2D($studentInfo);
		} else if ($sortby == "bygrade") {
			//sort descending
			newCols(0, 3);
			rsort($studentInfo);
			newCols(0, 3);
			display2D($studentInfo);
		} else if ($sortby == "byMajorDESCGradeASC") {

			usort($studentInfo, "byMajorDESCGradeASC");

			display2D($studentInfo);
		} else if ($sortby == "byGradeDESCNameASC") {
			usort($studentInfo, "byGradeDESCNameASC");

			display2D($studentInfo);
		}
	}
	?>

</body>

</html>