<html>

<body>
    <!--Have the form call itself for the action (reload)-->
    <form action="<?php echo $_PHP_SELF; ?>" method=post>
        <h1> Welcome to our daily Quiz! </h1>
        <p> When was GGS established? </p>

        <!--Radio Buttons for Questions-->
        <input type=radio name=ggc value=A> A. 2000<br />
        <input type=radio name=ggc value=B> B. 2005
        <?php if ($_POST["showKey"] == "yes") echo "<== Correct answer" ?><br />
        <input type=radio name=ggc value=C> C. 2010<br />
        <input type=radio name=ggc value=D> D. 2020<br />

        <!--Keep the checkbox checked-->
        <input type=checkbox name=showKey value=yes <?php if ($_POST["showKey"] == "yes") echo "checked";
                                                    ?>> Show me the correct answer after submission.<br /><br />


        <!--Submit and Reset Buttons-->
        <input type="submit" name="submit" value="Submit Quiz">
        <input type=reset name=reset value="Reset Quiz">
    </form>

    <?php

    // Handle if the submit button is pressed
    if (isset($_POST["submit"])) {
        if ($_POST["ggc"] == "B")
            echo "Your answer is correct.<br/>";
        else
            echo "Wrong! Try Again.";
    }
    ?>

    <hr />

    <?php
    // Store file to value
    $filename = "visitNumber.txt";

    // If statement to check the file contents
    $nVisitor = file_get_contents($filename);
    if ($nVisitor == NULL || $nVisitor == "") {
        $nVisitor = 0;
    }

    // Update the visitor count
    $nVisitor++;

    echo "This site has been visited by " . $nVisitor . " people!<br/>";

    // Save File
    file_put_contents($filename, $nVisitor, LOCK_EX); // Lock the exclusive file ( $filename )

    // Display Web IP Address of visitor
    echo "The new visitor's IP address is: " . $_SERVER["REMOTE_ADDR"] . "<br/>";
    ?>

    <hr />

    <?php
    // Make file for ip addresses
    $file = "log.txt";

    // Display all visitors historically
    $vList = file_get_contents($file);

    //Handle new visitor
    $ip = $_SERVER["REMOTE_ADDR"]; // usr ip addr
    $vTime = $_SERVER["REQUEST_TIME"]; // grabs the time visited
    $myDate = getdate($vTime); // Get the date visited
    $newVisitor = $ip . "\t" . $myDate["month"] . "/" . $myDate["mday"] . "/" .
        $myDate["year"] . " " . $myDate["hours"] . ":" . $myDate["minutes"] . ":" . $myDate["seconds"] . "\n";

    //Update List
    $vList = $vList . $newVisitor;
    echo "<pre>" . $vList . "</pre><br/>";

    // Append new file contents to the old file
    file_put_contents($file, $newVisitor, FILE_APPEND | LOCK_EX);
    ?>

</body>

</html>