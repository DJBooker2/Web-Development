<?php
function My_Connect_DB()
{
	$servername = "localhost";
	$username = "webtechnologysite"; //you need to change to your login id
	$password = "QLUXVGqAomausXy3RDBnK31oTlS6YJtnaKK8mGDvTjgFWRaUXLER8iRXzC15owg0eVxrSqOeedlq1kP3"; //altervista will use your login password
	$dbname = "my_webtechnologysite";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn)
		die("Connection to DB failed: " . mysqli_connect_error() . "<br/>");
	else
		return $conn;
}

function My_SQL_EXE($conn, $sql)
{

	$result = mysqli_query($conn, $sql);
	if ($result)
		echo "SQL is done successfully.<br/>";
	else
		echo "Error in running sql: " . $sql . " with error: " .
			mysqli_error($conn) . "<br/>";
	return $result;
}

function Run_Select_Show_Result($conn, $sql) // Must be select statement
{
	$result = My_SQL_EXE($conn, $sql);
	echo "<table border=1";
	echo "<tr>";
	while ($fieldinfo = mysqli_fetch_field($result)) {
		echo "<th>";
		echo $fieldinfo->name;
		echo "</th>";
	}
	echo "</tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		foreach ($row as $key => $value) {
			echo "<td>" . $value . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "Total rows: " . mysqli_num_rows($result) . "<br/>";
}

function Run_Sql_Show_Result($conn, $sql, $table)
{
	My_SQL_EXE($conn,$sql);
	$sql = "SELECT * FROM ". $table.";";
	Run_Select_Show_Result($conn, $sql);
}

function My_Disconnect_DB($conn)
{

	mysqli_close($conn);
}
