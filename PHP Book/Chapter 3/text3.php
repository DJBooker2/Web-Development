<!--
    Programmed By: DJ Booker
    June 6, 2021
    These programs will demonstrate Relation Operators
-->

<?php
$month = "March";

if ($month == "March") {
    echo "It's springtime<br>";
    echo "<hr />";
}
?>

<?php
// Equality and identity operators
$a = "1000";
$b = "+1000";

if ($a == $b) {
    echo "1";
}
if ($a === $b) {
    echo "2<br>";
    echo "<hr/>";
}
?>

<?php
// The inequality and not-identical operators
$a = "1000";
$b = "+1000";

if ($a != $b)  echo "1";
if ($a !== $b) echo "2";
echo "<br>";
echo "<hr/>";
?>

<?php
$a = 2;
$b = 3;

if ($a > $b) {
    echo "$a is greater than $b<br>";
}
if ($a < $b) {
    echo "$a is less than $b<br>";
}
if ($a >= $b) {
    echo "$a is greater than or equal too $b<br>";
}
if ($a <= $b) {
    echo "$a is less than or equal to $b<br>";
}
echo "<hr/>";
?>

<?php
    $a = 1; $b = 0;
    
    echo ($a AND $b) . "<br>";
    echo ($a or $b) . "<br>";
    echo ($a XOR $b) . "<br>";
    echo !$a . "<br>";
?>