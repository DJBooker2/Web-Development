<!--
    Programmed By: DJ Booker
    June 8, 2021
    This program will demonstrate the use of Loops
-->

<html>
<!--Center Text-->
<style>
    h1 {
        text-align: center;
    }
</style>

</html>

<!--Title-->
<?php
echo "<h1> Loops </h1>";
echo "<hr />";
echo "<br>";
?>

<!--A While Loop-->
<!--Uncomment to see the result. It is a infinite loop-->
<?php
/*
$fuel = 10;

while ($fuel > 1) {
    // Keep driving....
    echo "There's enough fuel";
} */
echo "There's enough fuel";  // Result of the while loop above
echo "<hr />";
echo "<br>";
?>

<!--While loop to print the 12 times tables-->
<?php
$count = 1;

while ($count <= 12) {
    echo "$count time 12 is " . $count * 12 . "<br>";
    ++$count;
}
echo "<hr />";
echo "<br>";
?>

<!--A do...while loop example-->
<?php
$count2 = 1;
do {
    echo "$count2 time 12 is " . $count2 * 12 . "<br>";
} while (++$count2 <= 12);
echo "<hr />";
echo "<br>";
?>

<!--12 times table using a for loop-->
<?php
for ($count3 = 1; $count3 <= 12; ++$count3) {
    echo "$count3 time 12 is " . $count3 * 12 . "<br>";
}
echo "<hr />";
echo "<br>";
?>

<!-- The continue statement-->
<!--Trapping division-by-zero errors using continue-->
<?php
$j = 10;

while ($j > -10) {
    $j--;
    if ($j == 0) {
        continue;
    }
    echo (10 / $j) . "<br>";
}
echo "<hr />";
echo "<br>";
?>

<!--Returning floating-point numbers-->
<?php
$a = 56;
$b = 12;
$c = $a / $b;

echo $c;
echo "<hr />";
echo "<br>";
?>

// Page 90