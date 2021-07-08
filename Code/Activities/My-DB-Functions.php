<?php
function My_Connect_DB()
{
	$servername = "localhost";
	$username = "webtechnologysite"; //you need to change to your login id
	$password = "Speedracer4"; //altervista will use your login password
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
	My_SQL_EXE($conn, $sql);
	$sql = "SELECT * FROM " . $table . ";";
	Run_Select_Show_Result($conn, $sql);
}

function My_Disconnect_DB($conn)
{

	mysqli_close($conn);
}

function UploadFile($tagName, $fileAllowed, $sizeAllowed, $overwriteAllowed)
{
	$uploadOK = 1;
	$dir = "upload/";
	$file = $dir . basename($_FILES[$tagName]["name"]);
	$fileType = pathinfo($file, PATHINFO_EXTENSION);
	$fileSize = $_FILES[$tagName]["size"];
	if ($fileSize > $sizeAllowed) {
		$uploadOK = 0;
		echo "File is too large<br/>";
	}
	if (!stristr($fileAllowed, $fileType)) {
		$uploadOK = 0;
		echo "File type is not allowed<br/>";
	}
	if (!$overwriteAllowed && file_exists($file)) {
		$uploadOK = 0;
		echo "File already exists<br/>";
	}
	if ($uploadOK == 1) {
		if (!move_uploaded_file($_FILES[$tagName]["tmp_name"], $file))
			$uploadOK = 0;
	}
	if ($uploadOK == 1)
		return $file;
	else
		return false;
}
