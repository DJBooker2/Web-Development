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
		<form method="post" enctype="multipart/form-data" action="/ITEC4450/Projects/Project3/Project3-Signup.php">
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
</body>

</html>