<!--
    Programmed By: DJ Booker
    June 24, 2021
    This program will demonstrate sessions
-->

<?php
session_start();
?>

<?php
if (isset($_POST["submit"])) {
	$which = 0;
	foreach ($_POST["name"] as $index => $item) {
		if ($_POST["buy"][$index] == "YES") {
			$_SESSION["buy"][$which] = array(
				$_POST["name"][$index],
				$_POST["image"][$index],
				$_POST["price"][$index],
				$_POST["amount"][$index]
			);
			$which++;
		}
	}
	//var_dump($_POST["buy"]);

	$_SESSION["totalCost"] = 0;
	echo "<table>";
	echo "<tr>";
	echo "<th>Item</th>
		<th>Price</th>
		<th>Quantity</th>";
	echo "</tr>";

	foreach ($_SESSION["buy"] as $item) {
		$_SESSION["totalCost"] += $item[2] * $item[3];
		echo "<tr>";
		echo "<td><img src='" . $item[1] . "' width=100 height=100></td>";
		echo "<td>" . $item[2] . "</td>";
		echo "<td>" . $item[3] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	echo "The total cost is \$" . $_SESSION["totalCost"] . "<br/>";
	echo "<a href='Action-06-24-2.php'>Checkout</a>";
}
?>