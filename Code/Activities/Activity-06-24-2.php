<?php
session_start();
?>


<h1>Thank you for your payment</h1>
Totally $<?php echo $_SESSION["totalCost"]; ?> has been deducted from your credit card: <?php echo $_GET["CCNumber"]; ?><br />
The following item(s) will be shipped to the following address: <?php echo $_GET["Address"]; ?><br />

<hr />
<?php

echo "<table style='width=60%; margin:auto'>";
echo "<tr>";
echo "<th>Item</th><th>Price</th><th>Quantity</th><th>Cost</th>";
echo "</tr>";
foreach ($_SESSION["buy"] as $item) {
	echo "<tr>";
	echo "<td><img src='" . $item[1] . "' width=100 height=100></td>";
	echo "<td>" . $item[2] . "</td>";
	echo "<td>" . $item[3] . "</td>";
	echo "<td>" . $item[2] * $item[3] . "</td>";
	echo "</tr>";
}
echo "</table>";
?>

<?php
session_unset();
session_destroy();
?>

<hr />
Your purchase transaction is done. Please click <a href='lab9.php'>here</a> to buy more!<br />