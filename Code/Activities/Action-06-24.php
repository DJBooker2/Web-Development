<!--
    Programmed By: DJ Booker
    June 24, 2021
    This program will demonstrate sessions
-->

<?php
session_start();
?>

<?php
if ($_SESSION["user"] == "admin" || ($_POST["user"] == "admin" && $_POST["passwd"] == "admin")) {
	if (!isset($_GET["which"])) //just logged in
	{
		$which = 0; //first question
		$_SESSION["user"] = $_POST["user"];
		$_SESSION["grade"] = 0;
		$_SESSION["nQ"] = 4; //number of questions in the test
		$_SESSION["key"] = array("C", "E", "D", "D");
		$_SESSION["choice"] = array();
	} else {
		$which = $_GET["which"];
		$_SESSION["choice"][$which] = $_GET["choice"];

		if ($_GET["next"] == "Submit Test") {
			foreach ($_SESSION["key"] as $index => $key) {
				if ($key == $_SESSION["choice"][$index])
					$_SESSION["grade"]++;
			}
			echo "Your name is: " . $_SESSION["user"] . "<br/>";
			echo "You answered " . $_SESSION["grade"] . " correctly out of " .
				$_SESSION["nQ"] . " question.<br/>";
			echo "your grade is " . round($_SESSION["grade"] / $_SESSION["nQ"] * 100, 2) . "%<br/>";

			//TODO: save the test result to a file or database
			session_unset();
			session_destroy();
			echo "Click <a href='Activity-06-24-1.php'>here</a> to retake the test<br/>";
			return;
		}
	}

	if (isset($_GET["prev"])) $which--;
	if (isset($_GET["next"])) $which++;

	displayQ($which);
} else {
	echo "Please login first.<br/>";
}
function displayQ($which)
{
	echo "<form method=get action='" . $_SERVER["PHP_SELF"] . "'>";
	if ($which == 0) {
		echo "Q" . ($which + 1) . ": What is 1+1=?<br/>";
		echo "<input type=radio name=choice value=A " . showChoice($which, "A") . "> A. 0<br/>";
		echo "<input type=radio name=choice value=B " . showChoice($which, "B") . "> B. 1<br/>";
		echo "<input type=radio name=choice value=C " . showChoice($which, "C") . "> C. 2<br/>";
		echo "<input type=radio name=choice value=D " . showChoice($which, "D") . "> D. 3<br/>";
		echo "<input type=radio name=choice value=E " . showChoice($which, "E") . "> E. 4<br/>";
	} else if ($which == 1) {
		echo "Q" . ($which + 1) . ": What is 2*3=?<br/>";
		echo "<input type=radio name=choice value=A " . showChoice($which, "A") . "> A. 0<br/>";
		echo "<input type=radio name=choice value=B " . showChoice($which, "B") . "> B. 2<br/>";
		echo "<input type=radio name=choice value=C " . showChoice($which, "C") . "> C. 4<br/>";
		echo "<input type=radio name=choice value=D " . showChoice($which, "D") . "> D. 5<br/>";
		echo "<input type=radio name=choice value=E " . showChoice($which, "E") . "> E. 6<br/>";
	} else if ($which == 2) {
		echo "Q" . ($which + 1) . ": What is 16/4=?<br/>";
		echo "<input type=radio name=choice value=A " . showChoice($which, "A") . "> A. 0<br/>";
		echo "<input type=radio name=choice value=B " . showChoice($which, "B") . "> B. 1<br/>";
		echo "<input type=radio name=choice value=C " . showChoice($which, "C") . "> C. 3<br/>";
		echo "<input type=radio name=choice value=D " . showChoice($which, "D") . "> D. 4<br/>";
		echo "<input type=radio name=choice value=E " . showChoice($which, "E") . "> E. 5<br/>";
	} else if ($which == 3) {
		echo "Q" . ($which + 1) . ": What is 4+2=?<br/>";
		echo "<input type=radio name=choice value=A " . showChoice($which, "A") . "> A. 0<br/>";
		echo "<input type=radio name=choice value=B " . showChoice($which, "B") . "> B. 2<br/>";
		echo "<input type=radio name=choice value=C " . showChoice($which, "C") . "> C. 4<br/>";
		echo "<input type=radio name=choice value=D " . showChoice($which, "D") . "> D. 6<br/>";
		echo "<input type=radio name=choice value=E " . showChoice($which, "E") . "> E. 8<br/>";
	}
	echo "<input type=hidden name=which value='" . $which . "'>";
	echo "<input type=submit name=prev value=Prev ";
	if ($which == 0) echo "disabled";
	echo ">";
	echo "<input type=submit name=next value=";
	if ($which == $_SESSION["nQ"] - 1)
		echo "'Submit Test'";
	else echo "Next";
	echo ">";

	echo "</form>";
}
function showChoice($which, $choice)
{
	if ($_SESSION["choice"][$which] == $choice)
		return "checked";
	else
		return "";
}
?>