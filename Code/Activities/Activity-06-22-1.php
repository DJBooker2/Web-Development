<!--
    Programmed By: DJ Booker
    June 22, 2021
    This program will demonstrate sorting
-->

<title> Activity-06-22-1 </title>

<?php

function displayArray($A)
{
	foreach ($A as $value) {
		echo $value . "\t";
	}
	echo "<br/>";
}
$numbers = array(14, 8, 19, -11, 3, 100, -4.3, 9.2); // Array of numbers

echo "Original Data<br/>";
displayArray($numbers);

echo "Sorting in ascending<br/>";
sort($numbers);
displayArray($numbers);
echo "Sorting in descending<br/>";
rsort($numbers);
displayArray($numbers);
?>

<?php
echo "<hr/>";

// Display Array
function displayAssociative($A)
{
	foreach ($A as $key => $value) {
		echo $key . "=>" . $value . "<br/>";
	}
	echo "<br>";
}

$people = array("Peter" => 35, "Ben" => 27, "Joe" => 18, "Kelly" => 46);

echo "Original Output<br/>";
displayAssociative($people);

echo "Sorting in ascending for associative array by value<br/>"; //By Value
asort($people);
displayAssociative($people);

echo "Sorting in ascending for associative array by value<br/>"; //By value
arsort($people);
displayAssociative($people);

echo "Sorting in ascending for associative array by keys<br/>"; //By name
ksort($people);
displayAssociative($people);

echo "Sorting in descending for associative array by keys<br/>"; //By name
krsort($people);
displayAssociative($people);
?>

<hr />

<?php
$Students = array(
	array("Mike", 22, "Male", 75),
	array("Jason", 18, "Male", 55),
	array("Jenny", 25, "Female", 95),
	array("Megan", 18, "Female", 85),
	array("Tom", 34, "Male", 75),
	array("Lily", 21, "Female", 75),
	array("Alex", 18, "Male", 88),
	array("Amy", 18, "Female", 75)
);
function display2D($A)
{
	echo "<table border=1>";
	echo "<tr><th>Name</th><th>Age</th><th>Gender</th><th>Grade</th></tr>";
	foreach ($A as $student) {
		echo "<tr>";
		foreach ($student as $info)
			echo "<td>" . $info . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo "Original Data";
display2D($Students);

echo "Sorted in ascending by names<br/>";
sort($Students); //sorted based on first column
display2D($Students);

echo "Sorted in descending by names<br/>";
rsort($Students); //sorted based on first column
display2D($Students);

// compare ages ascending
function cmpAgeASC($a, $b)
{
	if ($a[1] == $b[1]) {
		return 0; // Means they are the same
	} elseif ($a[1] > $b[1]) {
		return 1; // Means a is bigger that b
	} else
		return -1; // $a is smaller than $b
}

// compare ages descending
function cmpAgeDSC($a, $b)
{
	if ($a[1] == $b[1]) {
		return 0; // Means they are the same
	} elseif ($a[1] > $b[1]) {
		return -1; // Means a is bigger that b
	} else
		return 1; // $a is smaller than $b
}
echo "Sorted in descending by ages<br/>";
usort($Students, "cmpAgeDSC"); // Function to define how to sort data
display2D($Students);

function cmpGenderASC($a, $b)
{
	$index = 2; // Determine index
	if ($a[$index] == $b[$index]) {
		return 0; // Means they are the same
	} elseif ($a[$index] > $b[$index]) {
		return 1; // Means a is bigger that b
	} else
		return -1; // $a is smaller than $b
}

echo "Sorted in ascending by gender<br/>";
usort($Students, "cmpGenderASC"); // Function to define how to sort data
display2D($Students);

function cmpGenderDSC($a, $b)
{
	$index = 2; // Determine index
	if ($a[$index] == $b[$index]) {
		return 0; // Means they are the same
	} elseif ($a[$index] > $b[$index]) {
		return -1; // Means a is bigger that b
	} else
		return 1; // $a is smaller than $b
}

echo "Sorted in ascending by gender<br/>";
usort($Students, "cmpGenderDSC"); // Function to define how to sort data
display2D($Students);

function cmpGradesDSC($a, $b)
{
	$index = 3; // Determine index
	if ($a[$index] == $b[$index]) {
		return 0; // Means they are the same
	} elseif ($a[$index] > $b[$index]) {
		return -1; // Means a is bigger that b
	} else
		return 1; // $a is smaller than $b
}

echo "Sorted in ascending by gender<br/>";
usort($Students, "cmpGradesDSC"); // Function to define how to sort data
display2D($Students);
?>

<hr />

<?php
//Sort in two categories
function cmpGradeName($a, $b)
{
	$index1 = 3; //Grade
	$index2 = 0; //Name
	if ($a[$index1] == $b[$index1]) {
		if ($a[$index2] == $b[$index2]) {
			return 0;
		} elseif ($a[$index2] > $b[$index2]) {
			return 1;
		} else return -1;
	} elseif ($a[$index1] > $b[$index1]) {
		return -1;
	} else
		return 1;
}
echo "Sorted in descending by grade first, then ascending by names<br/>";
usort($Students, "cmpGradeName"); // Function to define how to sort data
display2D($Students);

//Sort in three categories
function cmpAgeGenderName($a, $b)
{
	$index1 = 1; 
	$index2 = 2; 
	$index3 = 0;
	if ($a[$index1] == $b[$index1]) {
		if ($a[$index2] == $b[$index2]) {
            if ($a[$index3] == $b[$index3]) {
                  return 0;
            }
		} elseif ($a[$index3] > $b[$index3]) {
			return -1;
		} else return 1;
	} elseif ($a[$index2] > $b[$index2]) {
		return 1;
	} else
		return 1;
}
echo "Sorted in descending by age, then in ascending by gender, then un descending by name<br/>";
usort($Students, "cmpAgeGenderName"); // Function to define how to sort data
display2D($Students);
?>