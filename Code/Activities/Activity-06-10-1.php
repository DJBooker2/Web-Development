<!--
    Programmed By: DJ Booker
    June 10, 2021
    This program will demonstrate the use of time and
-->


<?php
//Todays Date Different ways
echo "Today is: " . date("m/d/Y") . "<br/>"; // Y = year in 4 digits
echo "Today is: " . date("m/d/y") . "<br/>"; // y = year in 2 digits
echo "Today is: " . date("M/d/y") . "<br/>"; // M = short month (3 letters) 
echo "Today is: " . date("m/D/y") . "<br/>"; // D = Full day
echo "Today is: " . date("F/d/y") . "<br/>"; // F = full month spelled
echo "Today is: " . date("m-d-y") . "<br/>"; // "-" also acceptable
echo "Today is: " . date("d \of M \i\\n Y") . "<br/>"; // Different Format: "\" is used to escape actions

echo "<hr/>";

// Show the time of the server
echo "Now is: " . date("h:i:s") . "<br>"; // h = hour, i = minutes, s = seconds
echo "Now is: " . date("h:i:sa") . "<br>"; // a ads am or pm to the time
echo "Now is: " . date("h:i:sA") . "<br>"; // A = capital AM or PM
echo "Now is: " . date("H:i:s") . "<br>";  // H = Military time

echo "<hr />";

// LA time
date_default_timezone_set("America/Los_Angeles");
echo "Now is " . date("h:i:sA") . " in Los Angeles.<br/>";

// Georgia Time
date_default_timezone_set("America/New_York");
echo "Now is " . date("h:i:sA") . " in Georgia.<br/>";

echo "<hr/>";

// String to define time
$d = strtotime("March 21 1997");

// Time is saved using a number, which represents the number of seconds since the beginning of Jan 1, 1970. (standard time)
echo $d . "<br/>";

// Use date function to explain the big number
echo "The date you specified is: " . date("m/d/Y", $d) . "<br/>"; // Specify time period $d

// Found out what day you where born
$bday = strtotime("May 2 1890"); // You can also pass in "5/8/1990"
echo "I was born on " . date("l", $bday) . "<br/>"; // Lowercase L gets the day
echo "I was born on " . date("w", $bday) . " day of the week.<br/>"; // w = represent the day of the week 0-6 (sun-sat)

echo "<hr/>";

// Another time variance
$d2 = mktime(11, 24, 45, 8, 19, 2021); // hour, minute, second, month, day, year
echo "There are " . $d2 . " seconds for the specified time since 1970/1/1.<br/>";
echo "The created time is: " . date("Y-m-d h:i:sA", $d2) . "<br/>";

// Anothe time format
$d3 = strtotime("10:32pm April 15 2004");
echo "The created time is: " . date("Y-m-d h:i:sA", $d3) . "<br/>"; // Correct Format

$d3 = strtotime("10:32pm April/15/2004");
echo "The created time is: " . date("Y-m-d h:i:sA", $d3) . "<br/>"; // Incorrect Format

$d3 = strtotime("10:32pm April-15-2004");
echo "The created time is: " . date("Y-m-d h:i:sA", $d3) . "<br/>"; // Incorrect Format

$d3 = strtotime("10:32pm 4/15/2004");
echo "The created time is: " . date("Y-m-d h:i:sA", $d3) . "<br/>"; // Correct Format

$d4 = strtotime("tomorrow");
echo "The created time is: " . date("Y-m-d h:i:sA", $d4) . "<br/>";

$d4 = strtotime("Saturday");
echo "The created time is: " . date("Y-m-d h:i:sA", $d4) . "<br/>";  //

$d4 = strtotime("Next Saturday");                                       //  Same Day
echo "The created time is: " . date("Y-m-d h:i:sA", $d4) . "<br/>";    //

$d4 = strtotime("+1 week");
echo "The created time is: " . date("Y-m-d h:i:sA", $d4) . "<br/>"; // Add a week to date

$d4 = strtotime("+3 months");
echo "The created time is: " . date("Y-m-d h:i:sA", $d4) . "<br/>";

$d4 = strtotime("-5 years");
echo "The created time is: " . date("Y-m-d h:i:sA", $d4) . "<br/>";
?>

<hr />

<?php
// Count down of time (or to a specific time) continuously
//$d = strtotime("July 4"); // Specify the date to countdown to
$d = strtotime("July 4 1985"); // date in the past 
$diff = $d - time(); // time() returns the number of seconds form 1970/1/1 to current (now)
while ($diff < 0) {
    $d = strtotime("+1 year", $d); // Add year so it is always correct
    $diff = $d - time();
}

$days = ceil($diff / 60 / 60 / 24); // calculate the days
echo "There are " . $days . " days until " . date("M/d/Y", $d) . "<br/>";
?>