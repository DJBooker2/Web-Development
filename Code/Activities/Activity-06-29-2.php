<!--
    Programmed By: DJ Booker
    June 22, 2021
    This program will demonstrate
-->
<html>

<body>

	<form method=post action="<?php echo $_PHP_SELF; ?>">

		Type your SQL: <textarea cols=50 rows=10 name="sql"></textarea><br />

		Type your password: <input type=password name=passwd><br />

		<input type=submit value=Run name=submit><br />

	</form>

</body>

<?php

require_once "My-DB-Functions.php";

if (isset($_REQUEST["submit"])) {

	if ($_REQUEST["passwd"] == "58dher7@#%(&%d") {

		$conn = My_Connect_DB();

		$sql = $_REQUEST["sql"];

		//My_SQL_EXE($conn, $sql);

		Run_Select_Show_Result($conn, $sql, $Students);

		My_Disconnect_DB($conn);
	} else

		echo "Password is not correct, try again.<br/>";
}

?>

<hr />

<h1>Please Sign up first!</h1>

<form method=get action="<?php echo $_PHP_SELF; ?>">

	First name: <input type=text name=first><br /><br />

	Last name: <input type=text name=last><br /><br />

	Email: <input type=text name=email><br /><br />

	<input type=submit name=insert value="Sign me up"><br />
	<input type=submit name=remove value="Remove me"><br />
	<input type=submit name=show value="Display all"><br />

</form>

<?php

require_once "My-DB-Functions.php";

if (isset($_REQUEST["insert"])) {

	$conn = My_Connect_DB();

	$sql = "INSERT INTO Students(firstname, lastname, email)

              VALUES('" . $_REQUEST["first"] . "', '" .

		$_REQUEST["last"] . "','" .

		$_REQUEST["email"] . "');";

	My_SQL_EXE($conn, $sql);

	My_Disconnect_DB($conn);
} else if (isset($_REQUEST["remove"])) {
	$conn = My_Connect_DB();
	$sql = "DELETE FROM Students WHERE firstname = '" . $_REQUEST["first"] . "'
						AND lastname = '" . $_REQUEST["last"] . "'
						AND email = '" . $_REQUEST["email"] . "';";
	Run_Select_Show_Result($conn, $sql, $Students);
	My_Disconnect_DB($conn);
} else if (isset($_REQUEST["show"])) {
	$conn = My_Connect_DB();
	$sql = "SELECT * FROM Students";
	Run_Select_Show_Result($conn, $sql);
	My_Disconnect_DB($conn);
}

?>

</html>