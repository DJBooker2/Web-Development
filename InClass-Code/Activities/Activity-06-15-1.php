<!--
    Programmed By: DJ Booker
    June 15, 2021
    This program will demonstrate Arrays and their functionality
-->

<?php
// Car Array
$cars = array("BMW", "Toyota", "Volvo", 123);
echo "My car will be a " . $cars[0] . " once i graduate.<br>";

//Add another element
$cars[4] = "Ford";

// Initialize separately
$Friends[0] = "Mike";
$Friends[1] = "Jeff";
$Friends[2] = "Kate";
$Friends[3] = "Jenny";
$Friends[4] = "Josh";
$Friends[5] = "Jason";
$Friends[10] = "April";

// loop
for ($i = 0; $i < count($Friends); $i++) {
	echo "Friend No. " . ($i + 1) . " is " . $Friends[$i] . "<br>";
}
echo "<hr />";

// Foreach loop to print array
foreach ($Friends as $name)
	echo "The friend name is " . $name . "<br>";

echo "<hr />";

// Foreach loop to print array
foreach ($Friends as $i => $name)
	echo "The friend name is " . $name . "<br>";

echo "<br>";

// Associative Array
$SID["Mike"] = "123456";
$SID["Jack"] = "987654";
$SID["Steve"] = "789456";
$SID["April"] = "10000";
foreach ($SID as $name => $id)
	echo $name . "'s id is: " . $id . "<br/>";

echo "<hr/>";

$salary = array(
	"Mike" => 500, "Jason" => 370, "Phillip" => "4300", "Jack" => 6100, "Zac" => "2100",
	"Jenny" => 6300, "Mathew" => "3308", "April" => "6100", "Tyler" => "2900", "Tracy" => "5103", "Steve" => 1902
);

$sum = 0;
foreach ($salary as $money)
	$sum += $money;
echo " The total salary amount is: " . $sum . "<br>";


$topSalary = 0;
$topPerson = "";
foreach ($salary as $name => $money) {
	if ($money > $topSalary) {
		$topSalary = $money;
		$topPerson = $name;
	}
}
echo "The highest paid person is " . $topPerson . " whose salary is " . $topSalary . "<br/>";

echo "<hr/>";

// Find lowest paid and salary
$lowSalary = 9999999;
$lowPerson = "";
foreach ($salary as $name => $money) {
	if ($money < $lowSalary) {
		$lowSalary = $money;
		$lowPerson = $name;
	}
}
echo "The lowest paid person is " . $lowPerson . " whose salary is " . $lowSalary . "<br/>";
echo "<hr/>";

// Find second highest paid person
$secSalary = 0;
$secPerson = "";
foreach ($salary as $name => $money) {
	if ($money > $secSalary) {
		if ($money < $topSalary) {
			$secSalary = $money;
			$secPerson = $name;
		}
	}
}
foreach ($salary as $name => $money) {
	if ($money == $secSalary) {
		echo "The second highest paid person is " . $name . " whose salary is " . $secSalary . "<br/>";
	}
}




?>