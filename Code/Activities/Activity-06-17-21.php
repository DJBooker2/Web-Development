<!--
    Programmed By: DJ Booker
    June 17, 2021
    This program will demonstrate file saving form input
-->
<title>Activity-06-17-21</title>
<html>

<body>

    <h1>Please sign up</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        Name: <input type="text" name="name"><br />
        Email: <input type="text" name="email"><br />
        Major: <input type="text" name="major"><br />

        <input type="submit" name="submit" value="submit">
        <input type="reset" name="reset" value="reset">
    </form>

    <?php
    if (isset($_POST["submit"])) {
        echo "<hr/>";
        $file = "SignUpInfo.txt";
        $InfoStr = file_get_contents($file);
        $InfoStr = trim($InfoStr);
        $InfoList = explode("\n", $InfoStr);
        foreach ($InfoList as $index => $line) {
            $personInfo[$index] = explode("\t", $line); //$personInfo is a 2D array
        }
        // Verify if email has already been used
        foreach ($personInfo as $person) {
            if ($person[1] == $_POST["email"]) {
                echo "This email has already been used. Choose another one to try again.<br/>";
                return;
            }
        }
        echo "Thank your signing up.<br/>";
        echo "Your name: " . $_POST["name"] . "<br/>";
        echo "Your email: " . $_POST["email"] . "<br/>";
        echo "Your major: " . $_POST["major"] . "<br/>";

        // Save to file
        $Info = "";
        $Info .= $_POST["name"];
        $Info .= "\t";
        $Info .= $_POST["email"];
        $Info .= "\t";
        $Info .= $_POST["major"];
        $Info .= "\t";
        $Info .= $_SERVER["REMOTE_ADDR"];
        $Info .= "\t";
        $Info .= date("m/d/y");
        $Info .= "\t";
        $Info .= date("h:i:sA");
        $Info .= "\t";
        $Info .= rand(100000, 999999); // 6 digit random number
        $Info .= "\n";

        // Append to the file
        file_put_contents($file, $Info, FILE_APPEND | LOCK_EX); // Will insure the file is not overwritten!!
    }
    ?>

</body>

</html>