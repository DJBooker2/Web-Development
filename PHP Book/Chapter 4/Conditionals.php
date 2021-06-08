<!--
    Programmed By: DJ Booker
    June 8, 2021
    This program will demonstrate the use of Conditionals
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
echo "<h1> Conditionals </h1>";
echo "<hr />";
echo "<br>";
?>

<!--If statement with curly braces-->
<?php
$bank_balance = 85; // Initialize bank balance
if ($bank_balance < 100) {
    $money      = 1000; //Setting money value to 1000
    $bank_balance += $money; // add 1000 to bank balance
}

echo $bank_balance; // Print new balance, You see its 1085
// because the 1000 was added to 85

echo "<hr />";
echo "<br>";
?>

<!--Else Statement-->
<?php
$bank_balance2 = 150;
$savings = 0;
if ($bank_balance2 < 100) {
    $money        = 1000;
    $bank_balance2 += $money;
} else {
    $savings += 50;       // Add 50 to savings account
    $bank_balance2 -= 50; // Subtract 50 to savings account
}

echo "Your bank balance is: " . $bank_balance2 . "<br>";
echo "Your savings balance is: " . $savings;
echo "<hr />";
echo "<br>";
?>