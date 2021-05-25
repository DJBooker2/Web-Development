<!--
    Programmed By: DJ Booker
    5/25/2021
    Demonstrate Basics
-->

<html>

<head>
    <title>
        My first PHP program
    </title>

<body>
    <h1> Hello world!!! </h1>
    <?php
    echo "My first php program";
    echo "<h2>My first php program</h2>";
    echo "<span style='color:blue;'>My first php program</span>";
    $color = "cyan";
    ?>
    <p>
        // Hard Code Example
        //This is something else that is also <span style='color:green'> colorful </span>.

        //Use a variable
        This is something else that is also <span style='color:<?php echo $color ?>;'> colorful </span>.
    </p>
    <?php
    $school = "GA TECH"; //"GGC";
    echo "I like " . $school;
    ?>

    <hr />
    <?php
    $num = 123.456789;
    echo "The number is: " . $num . "<br/>";
    echo "The number plus 1 is: " . ($num + 1) . "<br/>";
    printf("The number in float is: %f<br/>", $num); // Display as Float
    printf("The number in int is: %d<br/>", $num); // Display as Decimal
    printf("The number in float with 2 decimal digits is: %.2f<br/>", $num); // Display float with 2 decimal digits

    echo "The number in float with 2 decimal digits is: " . round($num, 2) . "<br/>"; // use function round

    echo "The number in float with 2 decimal digits is: " . round($Num, 2) . "<br/>"; // self defined names are case sensitive

    echo "Echo is not case sensitive<br/>"; //PHP keywords are case insensitive
    ?>
</body>
</head>

</html>