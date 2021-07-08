<!--
    Programmed By: DJ Booker
    June 8, 2021
    This program will demonstrate how to sign up
-->

<title> Activity-07-8-2 </title>

<html>

<body>

	<h1>Please provide the following information to register:</h1>

	<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">

		<table>

			<tr>
				<td align=right>Type your ID:</td>
				<td>

					<input type="text" name="id" value="">

					<font color=red>(Only digits allowed)</font>
				</td>
			</tr>

			<tr>
				<td align=right>Choose your password:</td>
				<td>

					<input type="password" name="passwd">
				</td>
			</tr>

			<tr>
				<td align=right>Retype your password:</td>
				<td>

					<input type="password" name="passwd2">
				</td>
			</tr>

			<tr>
				<td align=right>Your name:</td>
				<td>

					<input type="text" name="name" value="">
				</td>
			</tr>

			<tr>
				<td align=right>Your Email:</td>
				<td>

					<input type="text" name="email" value="">
				</td>
			</tr>

			<tr>
				<td align=right>Your picture:</td>
				<td>

					<input type="file" name="myfile">
				</td>
			</tr>

			<tr>
				<td align=right><input type="submit" name="submit" value="Sign up"></td>

				<td><input type="reset" name="reset" value="Reset"></td>
			</tr>

		</table>

	</form>

	<?php
	require_once "My-DB-Functions.php";
	if (isset($_REQUEST["submit"])) {
		if (empty($_REQUEST["id"])) {
			echo "ID is required and only contains digits<br/>";
			exit();
		}
		if (empty($_REQUEST["passwd"])) {
			echo "Password is required.<br/>";
			exit();
		}
		if ($_REQUEST["passwd"] != $_REQUEST["passwd2"]) {
			echo "Password does not match.<br/>";
			exit();
		}
		$conn = My_Connect_DB();
		$sql = "CREATE TABLE Employee(
              id INT PRIMARY KEY,
              passwd VARCHAR(32),
        name VARCHAR(32),
        salary FLOAT(2),
        bonus FLOAT(2),
        photo VARCHAR(128),
        email VARCHAR(128)
          );";
		My_SQL_EXE($conn, $sql);
		$sql = "SELECT * FROM Employee WHERE id='" . $_REQUEST["id"] . "';";
		$result = My_SQL_EXE($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "ID already exists, please use another one<br/>";
			exit();
		} else {
			$file = UploadFile("myfile", "PNG:JPG:JPEG:GIF:BMP", 5000000, 1);
			$sql = "INSERT INTO Employee VALUES('" .
				$_REQUEST["id"] .
				"','" . md5($_REQUEST["passwd"]) .
				"','" . $_REQUEST["name"] .
				"'," . rand(50000, 100000) .
				",'0','" . $file .
				"','" . $_REQUEST["email"] .
				"');";
			My_SQL_EXE($conn, $sql);
			//Run_SQL_Show_Result($conn, $sql, "Employee");
			echo "<hr/>";
			Show_Me($conn, $_REQUEST["id"]);
			echo "<hr/>";
			echo "click <a href='Activity-07-8-1.php'> here </a> to login.<br/>";
		}
		My_Disconnect_DB($conn);
	}

	function Show_Me($conn, $id)
	{
		$sql = "SELECT * FROM Employee WHERE id='" . $id . "';";
		$result = My_SQL_EXE($conn, $sql);
		if ($row = mysqli_fetch_row($result)) {
			echo "Your information is listed as follows.<br/>";
			echo "ID: " . $row[0] . "<br/>";
			echo "Password: ******<br/>";
			echo "Name: " . $row[2] . "<br/>";
			echo "Email: " . $row[6] . "<br/>";
			echo "Salary: " . $row[3] . "<br/>";
			echo "Bonus: " . $row[4] . "<br/>";
			echo "<img src='" . $row[5] . "' width=200 height=200";
		} else {
			echo "No such id: " . $id . "<br/>";
		}
	}
	?>
</body>

</html>