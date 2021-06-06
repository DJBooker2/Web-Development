<!--
    Programmed By: DJ Booker
    June 6, 2021
    This program will demonstrate the use of boolean operators
-->

<?php
echo "a: [" . TRUE . "] <br/>"; // True value hold the value 1
echo "b: [" . FALSE . "] <br/>"; // False holds the value 0
?>

<?php
echo "<hr />";
echo "a: [" . (20 > 9) . "]<br/>";
echo "b: [" . (5 == 6) . "]<br/>";
echo "c: [" . (1 == 0) . "]<br/>";
echo "d: [" . (1 == 1) . "]<br/>";
?>

<?php
echo "<hr />";
$myname = "Brian";
$myage = 37;

echo "a: " . 73      . "<br>"; // Numeric Literal
echo "b: " . "Hello" . "<br>"; // String literal
echo "c: " . FALSE   . "<br>"; // Constant literal
echo "d: " . $myname . "<br>"; // String variable
echo "e: " . $myage  . "<br>"; // Numeric variable
?>

<?php
echo "<hr />";
$day_number = 360;
$days_to_new_year = 366 - $day_number; // Expression

if ($days_to_new_year < 30) {
    echo "Not log now till the new year"; // Statement
}
?>