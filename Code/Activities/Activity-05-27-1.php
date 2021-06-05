<!--
    Programmed By: DJ Booker
    5/27/2021 
    This program will go over basic programming skills 
-->

<?php
include "Lib-05-27.php";

// Call the function
showMSG();

// for loop to print the function i amount of times
for ($i = 0; $i < 20; $i++) {
    echo "No. " . ($i + 1) . ": ";
    showMSG();
}
echo "<hr/>";

// Initialize size to 10
$size = 10;

// for loop to change the size as its printed
for ($i = 0; $i < 20; $i++) {
    echo "<span style='font-size: " . $size . ";'>";
    echo "No. " . ($i + 1) . ": ";
    showMSG();
    echo "</span>";
    $size++;
}
?>

<?php
echo "<hr/>";

// Generate a random number to show different image based on value
$w = rand(0, 100);
if ($w < 25) {
    showImage("sunny");
} elseif ($w < 50) {
    showImage("rainy");
} elseif ($w < 75) {
    showImage("cloudy");
} else {
    showImage("windy");
}
?>

// Function to create the checker board using a table
<?php
echo "<hr/>";

// Initialize the size
$size = rand(1, 25);
echo "<p style='text-align:center;'>Size: " . $size . "X" . $size . " </p>";
echo "<table border = 1 style='width:400px;height=400px;margin:auto;'>";
$which = 1;
for ($row = 0; $row < $size; $row++) {
    echo "<tr>";
    for ($col = 0; $col < $size; $col++) {
        if ($col % 2 == $which) {
            echo "<td style='background-color:black;'>&nbsp</td>";
        } else
            echo "<td  style='background-color:white;>&nbsp</td>";
    }
    echo "</tr>";
    $which = !$which;
}
echo "</table>";
?>

<?php
echo "<hr/>";

// Initialize the size
$size = rand(1, 25);
$colors = array("red", "green", "blue");
echo "<p style='text-align:center;'>Size: " . $size . "X" . $size . " </p>";
echo "<table border = 1 style='width:400px;height=400px;margin:auto;'>";
$which = 1;
for ($row = 0; $row < $size; $row++) {
    echo "<tr>";
    for ($col = 0; $col < $size; $col++) {
        if ($col % 2 == 0) {
            echo "<td style='background-color:".$colors[$which].";'>&nbsp;</td>";
        } else if ($col % 3 == 1) {
            echo "<td  style='background-color:".$colors[($which+1)%3].";'>&nbsp;</td>";
        } else if ($col % 3 == 2) {
            echo "<td  style='background-color:".$colors[($which+1)%3].";'>&nbsp;</td>";
        }
    }
    echo "</tr>";
    $which++;
    $which = $which % 3;
}
echo "</table>";
?>