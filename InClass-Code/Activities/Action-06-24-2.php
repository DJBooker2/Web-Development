<?php
session_start();
?>

<?php
echo "Thank you for shopping with GGC store.<br/>";
echo "Totally you want to buy " . count($_SESSION["buy"]) . " items. And they are: ";
echo "<ul>";
foreach ($_SESSION["buy"] as $item)
	echo "<li>" . $item[3] . " &times; " . $item[0] . "</li>";
echo "</ul>";
echo "Please pay $" . $_SESSION["totalCost"] . "<br/>";
session_unset();
session_destroy();
?>