<!--
    Programmed By: DJ Booker
    June 24, 2021
    This program will demonstrate sessions
-->

<html>

<body>
	<h1>Welcome to GGC online store</h1>
	<form method=post action="Action-06-24-1.php">
		<table border=0>
			<tr>
				<td>Item</td>
				<td>Price</td>
				<td>Want to buy?</td>
				<td>Quantity</td>
			</tr>
			<?php
			$products = array(
				array("PC", 399, "https://images-na.ssl-images-amazon.com/images/I/41vCoY7c2KL.jpg"),
				array("iPhone", 999, "https://images-na.ssl-images-amazon.com/images/I/81ZJNQZBFCL._SL1500_.jpg"),
				array("iMAC", 1899, "https://images-na.ssl-images-amazon.com/images/I/31j0uJP6G5L.jpg")
			);
			foreach ($products as $item) {
				$name = $item[0];
				$price = $item[1];
				$image = $item[2];
				echo "<tr>";
				echo "<td><img src='" . $image . "' width=100 height=100>
    <input type=hidden name='name[]' value='" . $name . "'>
    <input type=hidden name='image[]' value='" . $image . "'
    <td/>
    <td>" . $price . "
    <input type=hidden name='price[]' value='" . $price . "'><td/>
    <td><input type=checkbox name='buy[]' value='YES'></td>
    <td><input type=number name='amount[]' value=1 min=0
    </td>";
				echo "</tr>";
			}
			?>
			<tr>
				<td colspan=4><input type="submit" name="submit" value="Add to cart">
			</tr>
		</table>
	</form>
</body>

</html>