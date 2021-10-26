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
$bank_balance = 50;
if ($bank_balance < 100) {
    $money       = 1000;
    $bank_balance += $money; // Bank balance is less than 100 so 1000 is added
}
echo $bank_balance; // updated account is 1050
echo "<hr />";
echo "<br>";
?>

<!--The else statement-->
<?php
$savings = 0; // Variable for savings account
$bank_balance2 = 185;
if ($bank_balance2 < 100) {
    $money          = 1000;
    $bank_balance2 += $money;
} else {
    $savings      += 50;  // Account is more than 100 so 50 gets added to the savings
    $bank_balance2 -= 50; // Subtract the 50 from the account
}

echo "This is your savings account balance: " . "$" . $savings . "<br>"; // Print the updated balance
echo "This is your new balance: " . "$" . $bank_balance2 . "<br>"; // Print the updated balance
echo "<hr />";
echo "<br>";
?>

<!--The if....elseif...else statement-->
<?php
$savings2 = 0; // Variable for savings account
$bank_balance3 = 385; // Set bank balance
if ($bank_balance3 < 100) {
    $money          = 1000;
    $bank_balance3 += $money;
} elseif ($bank_balance3 > 200) {
    $savings2        += 100; // Because the value is more we will add more
    $bank_balance3  -= 100; // Update bank account
} else {
    $savings2      += 50;  // Account is more than 100 so 50 gets added to the savings
    $bank_balance3 -= 50; // Subtract the 50 from the account
}

echo "This is your savings account balance: " . "$" . $savings2 . "<br>"; // Print the updated balance
echo "This is your new balance: " . "$" . $bank_balance3 . "<br>"; // Print the updated balance
echo "<hr />";
echo "<br>";
?>

<!--Multiple-line if...elseif...else statement-->
<?php
$page = "News"; // You can change this value to be any of the ones below
if ($page == "Home") {
    echo "You selected Home";
} elseif ($page == "About") {
    echo "You selected About";
} elseif ($page == "News") {
    echo "You selected News";
} elseif ($page == "Login") {
    echo "You selected Login";
} elseif ($page == "Links") {
    echo "You selected Links";
} else {
    echo "Unrecognized selection";
}
echo "<hr />";
echo "<br>";
?>

<!--A switch Statement-->
<?php
$page2 = "Login";
switch ($page2) {
    case "Home":
        echo "You selected Home";
        break;
    case "About":
        echo "You selected About";
    case "News":
        echo "You selected News";
        break;
    case "Login":
        echo "You selected Login";
        break;
    case "Links":
        echo "You selected Links";
        break;
    default:
        echo "Unrecognized Selection";
        break;
}
echo "<hr />";
echo "<br>";
?>

<!--The ? operator-->
<?php
$fuel = 75; // Set fuel value
echo $fuel <= 1 ? "Fill tank now" : "There's enough fuel";
echo "<hr />";
echo "<br>";
?>

<!--Assigning a ? conditional result to a variable-->
<?php
$fuel2 = 1;
$enough = $fuel2 <= 1 ? "FALSE" : "TRUE";
echo $enough; // Value is set to False
echo "<hr />";
echo "<br>";

/**
 * $saved = $saved >= $new ? $saved : $new;
 * 
 * If you take it apart carefully, you can figure out what this code does:
 *      $saved =                // Set the value of $saved to...        
 *              $saved >= $new  // Check $saved against $new    
 *      "?"                     // Yes, comparison is true...        
 *              $saved          // ... so assign the current value of $saved    
 *       :                      // No, comparison is false...        
 *              $new;           // ... so assign the value of $new
 */
?>