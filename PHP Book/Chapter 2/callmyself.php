<!--
    Programmed By: DJ Booker
    June 2, 2021
    This Program will show how to print how HTML in PHP.
-->

<?php

// Check to see if the submit button has been pressed already
if (isset($_POST['submitbutton'])) {
    print "<h1> Hello World </h1>"; // Print Hello world with HTML style
} else {
    // Print the button to prompt the user to push the button for results
    print "<html><head><title>PHP Example </title></head></html>";
    print "<form method='post' action='callmyself.php'>";
    print "<input type='submit' id='submitbutton' name='submitbutton' value='Find Hello World' />";
    print "</form>";
    print "</body></html>";
}
?>