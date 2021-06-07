<!--
    Programmed By: DJ Booker
    June 7, 2021
    This program will demonstrate the use of Literals and Variables
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
echo "<h1>Literals and Variables </h1>";
echo "<hr />";
echo "<br>";
?>

<!--Show 3 literals and 2 variables-->
<?php
$myname = "Brian";
$myage = 37;

echo "a: " . 73         . "<br>"; // Numeric literal
echo "b: " . "Hello"    . "<br>"; // String literal
echo "c: " . FALSE      . "<br>"; // Constant literal
echo "d: " . $myname         . "<br>"; // String literal
echo "e: " . $myage         . "<br>"; // Numeric literal
echo "<hr />";
echo "<br>";
?>

<!--An expression and a statement-->
<?php
$dayMSG = "";
$day_number = 361; // Get the current day of the year;
$days_to_new_year = 366 - $day_number; // Expression
if ($days_to_new_year < 30) {
    $dayMSG = "Not long now till the new year"; //Statement
}
echo $dayMSG;
?>