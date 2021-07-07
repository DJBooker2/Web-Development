<!--
    Programmed By: DJ Booker
    July 7, 2021
    This program will demonstrate Project 3
-->

<?php
session_start();
?>
<?php
if ($_POST["submit"]) {

	$_SESSION["deposit"] = $_POST["deposit"];
	$_SESSION["withdrawal"] = $_POST["withdrawal"];
	$_SESSION["ChangePassword"] = $_POST["ChangePassword"];
	$_SESSION["logout"] = $_POST["logout"];
}
?>
<?php

?>
<?php
echo "<form method =post action=BankingAction.php>";
if (
	$_SESSION["user"] == "admin" ||
	($_POST["user"] == "admin" && $_POST["password"] == "" . $_POST["password"] . "")
) {
	$_SESSION["balance"] = 0;

	echo "<div style='background-color:pink;border:red solid 1px;width:75%;margin:auto'>Welcome " . $_POST['user'] . "<br/>";
	date_default_timezone_set("America/New_York");
	echo "Now is " . date('m-d-Y h:i:s a') . "</div>";
	echo "<hr/>";
	echo "<div style='background-color:lightblue;border:red solid 1px;width:75%;margin:auto'>
       Choose what you want do based on the following menu: <br/>";
	echo "<hr/>";
	echo "<input type=radio name=showBalance value=showBalance>Show balance<br/>";
	echo "<input type=radio name=DepositAmount value=DepositAmount> Deposit Amount :<input type=text name= deposit value= ><br/>";
	echo "<input type=radio name=WithdrawalAmount value=WithdrawalAmount>Withdrawal Amount :<input type=text name= withdrawal value= ><br/>";
	echo "<input type=radio name=Transactions value=Transactions>Show My Transactions<br/>";
	echo "<input type=radio name=ChangePassword value=ChangePassword>Change My Password<br/>";
	echo "<input type=radio name=Logout value=Logout>Log out<br/>";
	echo "<input type=submit name= submit value=submit>";
	echo "<hr/></div>";
	echo "</form>";
} else {
	echo "please login first";
}
?>