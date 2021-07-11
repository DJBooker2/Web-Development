<!--
    Programmed By: DJ Booker
    June 11, 2021
    This program will demonstrate 
-->

<title> Project 4 </title>

<html>

<head>
	<title>
		Project 3
	</title>
</head>

<body style="margin:auto;width:50%;text-align:center;position:relative;top:100px;">

	<h1>ITEC 4450 Grade Search System</h1>
	<div style="border:blue 5px solid;width:50%;text-align:center;position:relative;left:25%;">
		<form action="Project3-Action-0.php" method="post">
			Please type your username:
			<input type="text" name="userid"><br />
			Please type your password:
			<input type="password" name="passwd"> <br />
			<input type="submit" value="log in" name="submit">
		</form>
	</div>
	<hr />
	<div>
		<h3>If you have not signed up, click <a href=Project4Signup.php>here</a> to register.</h3>
	</div>
</body>

</html>
<hr/>
<?php
/*
	The grade for each student is assigned with a random number between 0-100 when the student signs up.
	Make sure there are no duplicated student IDs.
	Make sure you keep the new password in your database after it is changed.
	Also make sure session is used to maintain the information across all the pages until logoff.
	*/
?>