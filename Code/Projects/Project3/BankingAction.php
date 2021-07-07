<!--
    Programmed By: DJ Booker
    July 7, 2021
    This program will demonstrate Project 3
-->
STOP HERE
<?php
session_start();

date_default_timezone_set('America/New_York');

$date = date("m/d/Y");
$time = date("h:i:sa");
$time2 = date("h:i:sA");
$date2 = date("M/d/Y");

$ip = $_SERVER['REMOTE_ADDR'];

if ($_POST['login'] == 'submit') {
	if ($_POST['user'] != 'admin' || $_POST['passwd'] != 'admin') {
		$login = true;
	} else {
		$_SESSION['balance'] = 0;
		$_SESSION['transactions'] = array();
		$_SESSION['Password'] = 'admin';
	}
}

if ($_POST['file'] == 'deposit') {
	$amount = intval($_POST["depositMoney"]);
	if ($amount > 0) {
		$_SESSION['balance'] += $amount;
		$transaction = "Deposit: $amount,
        on $date2, at $time2,
        from $ip";
		array_push($_SESSION['transactions'], $transaction);
	}
}
if ($_POST['file'] == 'withdraw') {
	$amount = intval($_POST["withdrawMoney"]);
	if ($amount > $_SESSION['balance'] || $amount <= 0) {
	} else {

		$_SESSION['balance'] -= $amount;
		$transaction = "Withdraw: $amount, on $date2, at $time2, from $ip";
		array_push($_SESSION['transactions'], $transaction);
	}
}
if ($_POST['file'] == 'logout') {
	session_unset();
	session_destroy();
}
if ($_POST['passwordButton'] == 'Change Password') {
	$oldPassword = $_POST['oldPassword'];
	$newPassword = $_POST['newPassword'];
	$retypePassword = $_POST['retypePassword'];
	$success = true;
	if ($oldPassword !=  $_SESSION['Password']) {
		$success = false;
		$oldPasswordMessage = "Old password is not correct";
	}
	if ($newPassword != $retypePassword) {
		$success = false;
		$newPasswordMessage = "Your new password does not match!";
	}
	if ($success == true) {
		$_SESSION['Password'] = $newPassword;
	}
}

?>

<html>

<head>
	<title>
		Your Bank
	</title>
	<style>
		div {
			background-color: lightblue;
			border: red solid 1px;
			width: 75%;
			margin: auto;
		}

		#withdraw,
		#welcomeAdmin,
		#deposit,
		#balance,
		#password,
		#logout,
		#transaction {
			background-color: pink;
			border: red solid 1px;
			width: 75%;
			margin: auto;

		}
	</style>

</head>

<body>


	<?php if ($login == true) :
		echo  " Your username or password is not correct, try again";
	?>

	<?php elseif ($_POST['file'] == 'withdraw') : ?>
		<div id="withdraw">
			<h3>Withdraw info:</h3>
			<?php if ($amount > 0) : ?>
				You successfully withdrew $<?= $amount ?><br />
				You new balance now is: $<?= $_SESSION["balance"] ?>
			<?php else : ?>
				Sorry, the withdraw must be a positive number. Please try again
			<?php endif ?>
		</div>
		<hr />
	<?php elseif ($_POST['file'] == 'balance') : ?>
		<div id="balance">

			<h3>Balance info:</h3>
			Dear customer, your balance is: $<?= $_SESSION["balance"] ?>
		</div>
		<hr />
	<?php elseif ($_POST['file'] == 'deposit') : ?>
		<div id="deposit">

			<h3>Deposit info:</h3>
			<?php if ($amount > 0) : ?>
				Thank you for your deposit of $<?= $amount ?><br />
				You new balance now is: $<?= $_SESSION["balance"] ?>
			<?php else : ?>
				Sorry, the deposit must be a positive number. Please try again
			<?php endif ?>
		</div>
		<hr />
	<?php elseif ($_POST['file'] == 'transaction') : ?>
		<div id="transaction">
			<br />
			<strong style> Transaction info:</strong>
			<br />
			<?php foreach ($_SESSION['transactions'] as $value => $trans) : ?>
				<br />
				<?= $value + 1 ?>.<?= $trans ?>
			<?php endforeach ?>
		</div>
		<hr />
	<?php elseif ($_POST['file'] == 'password' || $_POST['passwordButton'] == 'Change Password') : ?>
		<div id="password">
			<h3>Change your password:</h3>
			<form action="BankingAction.php" method="post">
				<?php if ($success == true) : ?>
					Your password has been successfully changed.<br />
				<?php else : ?>
					Old password: <input type="password" name="oldPassword"><span class="errormessage"><?= $oldPasswordMessage ?></span><br /><br />
					New password:<input type="password" name="newPassword"><span class="errormessage"><?= $newPasswordMessage ?></span><br /><br />
					Retype new password:<input type="password" name="retypePassword"><br /><br />
					<input type="submit" name="passwordButton" value="Change Password">
				<?php endif ?>
			</form>
		</div>
		<hr />
	<?php elseif ($_POST['file'] == 'logout') : ?>
		<div id="logout">
			<h3> Logout info:</h3>
			You logged out successfully. Please click <a href="Project3.php">here</a> to login again.<br />
			Just a friendly reminder that this is a fake bank system. When you log out,
			your deposit will be reset to 0 and all your transactions will be cleared.
		</div>

	<?php elseif (!isset($_POST['file'])) : ?>
		<div id="welcomeAdmin">
			Welcome admin<br />
			Now is <?= $date ?> <?= $time ?>
		</div>

		<hr />
	<?php endif ?>
	<?php if ($_POST['file'] != 'logout' && $login != true) : ?>
		<div id="file">
			Choose what you want do based on the following menu:
			<hr />
			<form action="BankingAction.php" method="post">
				<input type="radio" name="file" value="balance">Show my balance <br />
				<input type="radio" name="file" value="deposit">Deposit this amount:
				<input type="text" name="depositMoney" value=0><br />
				<input type="radio" name="file" value="withdraw">Withdraw this amount:
				<input type="text" name="withdrawMoney" value=0><br />
				<input type="radio" name="file" value="transaction"> Show my transactions<br />
				<input type="radio" name="file" value="password"> Change my password<br />
				<input type="radio" name="file" value="logout">Log out<br />
				<input type="submit" name="fileButton" value="Submit">
				<hr />
			</form>

		</div>

	<?php endif ?>

</body>

</html>