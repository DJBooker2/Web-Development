<!--
    Programmed By: DJ Booker
    June 11, 2021
    This program will demonstrate the user interactions after signing in
-->

<html>

<head>
	<title>
		Project 3 Sign up page
	</title>
</head>

<body style="margin:auto;width:60%;text-align:center;position:relative;top:80px;">

	<h1>Welcome to join the ITEC 4450 class!!!</h1>
	<h2>Please provide the following information for registration</h2>
	<div style="border:blue 5px solid;width:55%;text-align:center;position:relative;left:20%;">
		<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table border=0 style="text-align:left">
				<tr>
					<td style="text-align:right">Choose your ID:</td>
					<td> <input type="text" name="id"></td>
				</tr>
				<tr>
					<td style="text-align:right">Choose your password:</td>
					<td> <input type="password" name="passwd"></td>
				</tr>
				<tr>
					<td style="text-align:right">Retype your password:</td>
					<td> <input type="password" name="passwd2"></td>
				</tr>
				<tr>
					<td style="text-align:right">Your name:</td>
					<td> <input type="text" name="name"></td>
				</tr>
				<tr>
					<td style="text-align:right">Your email:</td>
					<td> <input type="text" name="email"></td>
				</tr>
				<tr>
					<td style="text-align:right">Please upload your picture:</td>
					<td> <input type="file" name="myfile"></td>
				</tr>
				<tr>
					<td style="text-align:right"></td>
					<td><input type="submit" value="Sign up" name="submit"></td>
				</tr>
			</table>
		</form>
	</div>
	<span style=color:red>Please fill in the information correctly!</span><br />

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
		$sql = "CREATE TABLE Grades(
              id INT PRIMARY KEY,
              passwd VARCHAR(32),
        name VARCHAR(32),
        salary FLOAT(2),
        bonus FLOAT(2),
        photo VARCHAR(128),
        email VARCHAR(128)
          );";
		My_SQL_EXE($conn, $sql);
		$sql = "SELECT * FROM Grades WHERE id='" . $_REQUEST["id"] . "';";
		$result = My_SQL_EXE($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo "ID already exists, please use another one<br/>";
			exit();
		} else {
			$file = UploadFile("myfile", "PNG:JPG:JPEG:GIF:BMP", 5000000, 1);
			$sql = "INSERT INTO Grades VALUES('" .
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
			echo "click <a href='Project4.php'> here </a> to login.<br/>";
		}
		My_Disconnect_DB($conn);
	}

	function Show_Me($conn, $id)
	{
		$sql = "SELECT * FROM Grades WHERE id='" . $id . "';";
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