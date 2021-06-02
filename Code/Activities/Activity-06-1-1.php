<html>

<body>

    <!--Using action to submit the filled information-->
    <form action="Action-06-1.php" method="get">

        <!--Field for user to input for name and email-->
        Name: <input type="text" name="name" value="Mike"><br /><br />
        Email: <input type="text" name="email" value="abc123@ggc.edu"><br /><br />

        <!---->
        Your income is: <br />
        <input type="radio" name="income" value="A"> Less than 50K <br />
        <input type="radio" name="income" value="B"> More than 50K but less than 100K <br />
        <input type="radio" name="income" value="C"> More than 100K <br />

        <!--Submit Button-->
        <input type="submit" name="submit" value="Submit Me"><br /><br />

    </form>
    <hr />

    <!--Avoid Hardcoding-->
    <form action="<?php echo $_PHP_SELF; ?>" method="post">

        <!--Field for user to input for name and email-->
        Name: <input type="text" name="name" value="Mike"><br /><br />
        Email: <input type="text" name="email"><br /><br />

        <!---->
        Your income is: <br />
        <input type="radio" name="income" value="A"> Less than 50K <br />
        <input type="radio" name="income" value="B"> More than 50K but less than 100K <br />
        <input type="radio" name="income" value="C"> More than 100K <br />

        <!--Submit Button-->
        <input type="submit" name="submit" value="Submit Me"><br /><br />

    </form>

    <?php
    // Function to prevent malitious scripts from being run
    function validate_input($input)
    {
        $input = trim($input); //ltrim, rtrim for left and right trim
        $input = htmlspecialchars($input);

        return $input;
    }

    // If statement to run when buton pressed
    if (isset($_POST["submit"])) {
        // Save the entered information
        $name = validate_input($_POST["name"]);
        $email = validate_input($_POST["email"]);

        // Echo output
        echo "<hr/>";
        echo "Your provided name is: " . $name . "<br />";
        echo "Your provided email is: " . $email . "<br />";

        // Value to hold income
        $income = validate_input($_POST["income"]);
        if ($income == "A")
            echo "Your income is less than 50K.<br/>";
        else if ($income == "B")
            echo "Your income is more than 50Kbut less than 100K.<br/>";
        else if ($income == "C")
            echo "Your income is more than 100K.<br/>";
        else
            echo "Your income is not specified.<br/>";
    }
    ?>
</body>

</html>