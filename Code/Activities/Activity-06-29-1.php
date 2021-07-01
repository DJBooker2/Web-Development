<!--
    Programmed By: DJ Booker
    June 22, 2021
    This program will demonstrate interactions with a database in Altervista
-->

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

function My_Disconnect_DB($conn)
{

	mysqli_close($conn);
}
?>

<?php
$conn = My_Connect_DB();
/*
$sql = "CREATE TABLE Students(
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP
        );";
My_SQL_EXE($conn, $sql);
*/

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Michael','Jordan','michael@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Lindsey','Sabb','sabb@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('David','Mercado', 'david@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Tyree','King', 'king@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Julio','Barroso', 'julio@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Sedina','Husanovic', 'Sedina@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Maria','Brichikov', 'Maria@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Carina','George', 'carina@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('David','Shirley', 'shirley@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Faisal','Badwan', 'faisal@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Gabrielle','Bloomfield', 'bloomfield@ggc.edu');";
My_SQL_EXE($conn, $sql);

$sql = "INSERT INTO Students(firstname, lastname, email) VALUES('Joseph','Klimenko', 'joseph@ggc.edu');";
My_SQL_EXE($conn, $sql);

My_Disconnect_DB($conn);
?>