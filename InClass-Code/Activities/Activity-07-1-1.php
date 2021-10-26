<!--
    Programmed By: DJ Booker
    July 1, 2021
    This program will demonstrate
-->

<title> Activity-07-1-1 </title>
<?php
require_once "My-DB-Functions.php";

$conn = My_Connect_DB();
echo "Show all students:<br/>";
$sql = "SELECT * FROM Students";
Run_Select_Show_Result($conn, $sql);


echo "Add a student:<br/>";
$sql = "INSERT INTO Students (firstname, lastname, email) VALUES ('John','Jackson', 'John@ggc.edu');";
Run_Sql_Show_Result($conn, $sql, "Students");

echo "Add age info to all students:<br/>";

$sql = "ALTER TABLE Students ADD age INT(3)";
Run_Sql_Show_Result($conn, $sql, "Students");

echo "Change all students age to 21:<br/>";
$sql = "UPDATE Students SET age=21;";
Run_Sql_Show_Result($conn, $sql, "Students");

echo "Change a couple of students age to 19:<br/>"; //id is 8 or 6
$sql = "UPDATE Students SET age=19 WHERE (id =8 OR id =6);";
Run_Sql_Show_Result($conn, $sql, "Students");

echo "CHange most of the students age to a random number between (0,100):<br/>";
$sql = "UPDATE Students SET age = FLOOR(RAND() * 100) WHERE age = 21;";
Run_Sql_Show_Result($conn, $sql, "Students");

echo "Remove a Student:<br/>";
$sql = "DELETE FROM Students WHERE id=15;";
Run_Sql_Show_Result($conn, $sql, "Students");

echo "Remove students' reg-date info:<br/>";
$sql = "ALTER TABLE Students DROP COLUMN reg_date;";
Run_Sql_Show_Result($conn, $sql, "Students");

echo "Find the total number of students:<br/>";
$sql = "SELECT count(*) as 'Total # of students' FROM Students;";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Find the total number of students who are 40+ years old:<br/>";
$sql = "SELECT count(*) as 'Total number of students who are 40+ years old' FROM Students WHERE age >=40;";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Find the average age of all students:<br/>";
$sql = "SELECT avg(age) as 'Average age' FROM Students;";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Find the highest and lowest age of all students";
$sql = "SELECT max(age) as 'Oldest age', min(age) as 'Youngest age' FROM Students;";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Sort in ascending order by last name:<br/>";
$sql = "SELECT * FROM Students ORDER BY lastname ASC;";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Sort in descending order by ages for all students who is John Jackson:<br/>";
$sql = "SELECT * FROM Students WHERE firstname = 'John' AND lastname = 'Jackson' ORDER BY age DESC;";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Find how many people having the first name John:<br/>";
$sql = "SELECT firstname, COUNT(*) as '# of students of this name' FROM Students WHERE firstname = 'John';";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Find all people who have the same first name and sort them in descending order by number of people:<br/>";
$sql = "SELECT firstname, COUNT(firstname) as 'No_of_people_with_this_name' FROM Students GROUP BY firstname ORDER BY No_of_people_with_this_name DESC;";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Find all Youngest student(s):<br/>";
// Nested Select Statement
$sql = "SELECT id, firstname, lastname, age FROM Students WHERE age = (SELECT MIN(age) FROM Students);";
Run_Select_Show_Result($conn, $sql, "Students");

echo "Find all the students who are older than the average age:<br/>";
$sql = "SELECT id, firstname, lastname, age FROM Students WHERE age > (SELECT AVG(age) FROM Students);";
Run_Select_Show_Result($conn, $sql, "Students");
My_Disconnect_DB($conn);
?>