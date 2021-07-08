<!--
    Programmed By: DJ Booker
    June 8, 2021
    This program will demonstrate information systems and login
-->

<title> Activity-07-8-1 </title>

<?php
session_start(); // start session
?>
<html>

<body>
	<h1>Employee Information System</h1>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		Please type your ID:
		<input type="text" name="id"><br />
		Please type your password:
		<input type="password" name="passwd"><br />
		<input type="submit" name="submit" value="See my information">
	</form>
	<hr />
	Want to sign up, click <a href="Activity-07-08-2.php">here</a>.<br />
	If you are the boss, click <a href="Activity-07-08-3.php">here</a> to enter.<br />
	Forget your password? click <a href="Activity-07-08-5.php">here</a> to reset.<br />
	<hr />
	<?php
	require_once "My-DB-Functions.php";
	if (isset($_REQUEST["submit"])) {
		if (!empty($_REQUEST["id"])) { // sign in
			$conn = My_Connect_DB();

			$sql = "SELECT * FROM Employee Where id='" . $_REQUEST["id"] . "' AND passwd='" . md5($_REQUEST["passwd"]) . "';"; // MD5 encrypts the password
			$result = My_SQL_EXE($conn, $sql); // Run statement
			if (mysqli_num_rows($result) <= 0) { // empty result means no found matches
				echo "Your id or password is wrong, try again.<br/>";
			} else {
				$_SESSION["id"] = $_REQUEST["id"]; // sets session id to the login id
				Show_Me($conn, $_REQUEST["id"]);
				echo "<hr/>";
				echo "Click <a href='Activity-07-8-4.php'>here</a> to logoff.<br/>";
			}
			My_Disconnect_DB($conn);
		}
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