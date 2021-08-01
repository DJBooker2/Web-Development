<?php

for ($i = 0; $i <= 100; $i++)
    echo $i . ", ";

// Find the summation of all numbers from 0 to 100, inclusively

$sum - 0;
for ($i = 0; $i <= 100; $i++)
    $sum += $i;
echo "<br/> The sum from 0 to 100 is: " . $sum . "<br/>";
echo "<hr/>";
?>

<?php

$nStar = 10;
for ($line = 0; $line < $nStar; $line++) {
    for ($i = 0; $i < $nStar; $i++)
        echo "*";
    echo "<br/>";
}
echo "<hr/>";
//triangle up

for ($line = 0; $line < $nStar; $line++) {
    for ($i = 0; $i < $line + 1; $i++)
        echo "*";
    echo "<br/>";
}

//triangle down
for ($line = 0; $line < $nStar; $line++) {
    for ($i = 0; $i < $nStar - $line; $i++)
        echo "*";
    echo "<br/>";
}
echo "<hr/>";

//triangle
for ($line = 0; $line < $nStar; $line++) {

    for ($k = 0; $k < $nStar - $line - 1; $k++)
        echo "&nbsp";

    for ($i = 0; $i < $line + 1; $i++)
        echo "*";
    echo "<br/>";
}

echo "<hr/>";

//up straight triangle
for ($line = 0; $line < $nStar; $line++) {

    for ($k = 0; $k < $nStar - $line - 1; $k++)

        echo "<span style='color:white;'>*</span>";
    for ($i = 0; $i < $line + 1; $i++)
        echo "*";
    echo "<br/>";
}

?>

<?php
function drawTrapezoid($top, $bottom, $letter)
{
    for ($line = $top; $line <= $bottom; $line++) {
        for ($i = 0; $i < $line; $i++)
            echo $letter;
        echo "<br/>";
    }
}

?>

<?php
echo "<hr/>";
drawTrapezoid(5, 10, "*");

echo "<hr/>";
echo "<div style='width:50%;margin:auto; background-color:blue; text-align:center; color:red'>";
drawTrapezoid(5, 10, "*");
echo "</div>";

echo "<hr/>";
echo "<div style='line-height:0.5;width:50%;margin:auto; background-color:blue; text-align:center; color:red'>";
drawTrapezoid(1, 10, "*");
echo "</div>";

echo "<hr/>";
echo "<table style='background-color:blue; color:red; margin: auto; width:50%'>";
echo "<tr>";
echo "<td>";
echo "<div style='line-height:0.5;width:50%; background-color:blue; text-align:right; color:red'>";
drawTrapezoid(1, 10, "*");
echo "</div>";
echo "</td>";
echo "<td></td>";
echo "</tr>";
echo "</table>";

echo "<hr/>";
echo "<table style= 'background-color:blue;color:red;width:50%;margin:auto;'>";
echo "<tr>";
echo "<td>";
echo "<div style='line-height:0.5;text-align:center;'>";
drawTrapezoid(1, 10, "*");
echo "</div>";
echo "</td>";
echo "<td>";
echo "<div style='line-height:0.5;text-align:center;'>";
drawTrapezoid(1, 10, "*");
echo "</div>";
echo "</td>";
echo "</tr>";
echo "</table>";
?>