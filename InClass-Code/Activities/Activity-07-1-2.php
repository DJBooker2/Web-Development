<!--
    Programmed By: DJ Booker
    July 1, 2021
    This program will demonstrate
-->

<title> Activity-07-1-2 </title>
<html>

<body>
	<h1>Student Search System</h1>
	<form method=get action="<?php echo $_PHP_SELF; ?>">
		<h2>Choose Search Type:<br /></h2>
		<select name=searchtype>
			<option value="id">id</option>
			<option value="firstname">firstname</option>
			<option value="lastname">lastname</option>
			<option value="email">email</option>
			<option value="age">age (>=)</option>
		</select>
		<h2>Enter Search Term:</h2>
		<input name=searchterm type=text size=40>
		<span style="color:red;">(Enter an * to list all students)</span>
		<br />
		<input type=submit name=submit value=Search>
	</form>
	<hr />
</body>
<?php
require_once "My-DB-Functions.php";
if (isset($_REQUEST['submit'])) {
	if (isset($_REQUEST['searchterm'])) {
		$conn = My_Connect_DB(); // conn to database
		if($_REQUEST["searchterm"] == "*")
		{
			$sql = "SELECT * FROM Students"; // Select all students
		}
		else if ($_REQUEST["searchtype"] == "age") {
			$sql = "SELECT * FROM Students WHERE " . $_REQUEST['searchtype'] . " >= '" . $_REQUEST['searchterm'] . ";'"; // Based on the dropdown box and search bar
		} else {
			// SELECT * FROM Students WHERE id = '4';
			$sql = "SELECT * FROM Students WHERE " . $_REQUEST['searchtype'] . " = '" . $_REQUEST['searchterm'] . ";'"; // Based on the dropdown box and search bar
		}
		Run_Select_Show_Result($conn, $sql);
		My_Disconnect_DB($conn); // Close Connection
	} else {
		echo "No query was provided.<br/>";
	}
} else {
	echo "Please submit your query by clicking on the submit button.<br/>";
}
?>
</html>