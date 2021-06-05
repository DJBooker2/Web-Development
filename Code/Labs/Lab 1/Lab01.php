<?php
function trap($top, $bottom, $char)
{
    for ($row = $top; $row <= $bottom; $row++) {
        for ($col = 0; $col < $row; $col++)
            echo $char;
        echo "<br/>";
    }
}

function stump()
{
    $nStars = 5;
    for ($row = 0; $row < $nStars; $row++) {
        for ($col = 0; $col < $nStars; $col++) {
            echo "*";
        }
        echo "<br/>";
    }
}

echo "<div style='text-align:center;background-color:cyan;color:red;width:50%;margin:auto; line-height: 0.6;'>";
trap(1, 4, "*");
trap(3, 9, "*");
trap(5, 14, "*");
stump();
echo "</div>";


echo "<hr/>";

echo "<table border=0 style='text-align:center;background-color:pink;color:blue;width:50%;margin:auto; line-height:0.6;'>";
echo "<tr>";
echo "<td>";
trap(1, 4, "*");
trap(3, 9, "*");
trap(5, 14, "*");
stump();
echo "</td>";
echo "<td>";
trap(1, 4, "*");
trap(3, 9, "*");
trap(5, 14, "*");
stump();
echo "</td>";
echo "<td>";
trap(1, 4, "*");
trap(3, 9, "*");
trap(5, 14, "*");
stump();
echo "</td>";
echo "<td>";
trap(1, 4, "*");
trap(3, 9, "*");
trap(5, 14, "*");
stump();
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<hr/>";
