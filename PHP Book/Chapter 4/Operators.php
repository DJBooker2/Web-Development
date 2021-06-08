<!--
    Programmed By: DJ Booker
    June 7, 2021
    This program will demonstrate the use of Operators
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
echo "<h1> Operators </h1>";
echo "<hr />";
echo "<br>";
?>

<!--A multiple-assignment statement-->
<?php
$level = $score = $time = 0; // Initialize all the variables in one statement

echo $score . "<br>"; // prints 0
echo $level . "<br>"; // prints 0
echo $time  . "<br>"; // prints 0
echo "<hr />";
echo "<br>";
?>

<!--Assigning a value and testing for equality-->
<?php
$month = "March";

if ($month == "March") {
    echo "It's springtime";
}
echo "<hr />";
echo "<br>";
?>

<!--The Equality and identity operators-->
<?php
$a = "1000";
$b = "+1000";

if ($a == $b) {
    echo "1";
}
if ($a === $b) {
    echo "2";
}
echo "<hr />";
echo "<br>";
?>

<!--The inequality and not-identical operators-->
<?php
$a2 = "1000";
$b2 = "+1000";

if ($a2 != $b2) {
    echo "1";
}
if ($a2 !== $b2) {
    echo "2";
}
echo "<hr />";
echo "<br>";
?>

<!--Four Comparison Operators-->
<?php
$a3 = 2;
$b3 = 3;

if ($a3 > $b3) {
    echo "$a3 is greater than $b3 <br";
}
if ($a3 < $b3) {
    echo "$a3 is less than $b3 <br>";
}
if ($a3 >= $b3) {
    echo "$a3 is greater than or equal to $b3 <br>";
}
if ($a3 <= $b3) {
    echo "$a3 is less than or equal to $b3 <br>";
}
echo "<hr />";
?>

<!--Logical Operators-->
<?php
$a4 = 1;
$b4 = 0;

echo ($a4 and $b4) . "<br>";
echo ($a4 or $b4) . "<br>";
echo ($a4 xor $b4) . "<br>";
echo !$a4 . "<br>";
echo "<hr />";
echo "<br>";
?>