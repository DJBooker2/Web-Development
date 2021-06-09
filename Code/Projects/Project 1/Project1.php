<!--
    Programmed By: DJ Booker
    June 7, 2021
    This program will demonstrate the use of gathering information using forms
-->


<!DOCTYPE html>
<html>

<head>
    <title>
        Project 1
    </title>
    <style>
        .required {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    // Function to prevent malicious scripts from being run
    function validate_input($input)
    {
        $input = trim($input); //ltrim, rtrim for left and right trim
        $input = htmlspecialchars($input);

        return $input;
    }

    // Variables to hold user information
    $name = $email = $major = "";
    $nameMSG = $emailMSG = "";
    $Q1 = $Q2 = $Q3 = $Q4 = "";

    // Handle Submit
    if (isset($_POST["submit"])) {
        $name = validate_input($_POST["name"]);
        $email = validate_input($_POST["email"]);
        $major = validate_input($_POST["major"]);
        $Q1 = validate_input($_POST["Q1"]);
        $Q2 = validate_input($_POST["Q2"]);
        $Q3 = validate_input($_POST["Q3"]);
        $Q4 = validate_input($_POST["Q4"]);

        // If fields are empty display the name is required
        if (empty($name)) {
            $nameMSG = "A name is required!";
        }

        // If fields are empty display the Email is required
        if (empty($email)) {
            $emailMSG = "An email is required!";
        } else {
            // Check if the email is a valid email address
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailMSG = "Email format is not correct!";
            }
        }
    }
    ?>

    <?php
    if (isset($_POST["submit"])) {
        $score = 0;
        $nq = 4;        // Total number of questions
        $ppq = 100 / $nq; //divide by questions

        // Compare the answers taken from user
        if ($_POST["Q1"] == "B")
            $score += $ppq;
        if ($_POST["Q2"] == "A")
            $score += $ppq;
        if ($_POST["Q3"] == "D")
            $score += $ppq;
        if ($_POST["Q4"] == "B")
            $score += $ppq;
    }
    ?>

    <h1>Welcome to this Web Based Test!!!</h1>
    <p>Please answer the following questions:</p>
    <hr />
    <form action="<?php echo $_PHP_SELF ?>" method="post">
        <!--Name Field-->
        Name: <input type=text name=name value="<?php echo $name; ?>">
        <span class=required>* <?php echo $nameMSG; ?> </span> <br /><br />

        <!--Email Field-->
        Email: <input type=text name=email value="<?php echo $email; ?>">
        <span class=required> * <?php echo $emailMSG; ?> </span> <br /><br />
        <hr />
        <!--Area Of Study-->
        Choose your major area of study: <select name="major">
            <option value="Digital Media" <?php if ($major == "Digital Media") echo "selected"; ?>>Digital Media</option>
            <option value="Software" <?php if ($major == "Software") echo "selected"; ?>>Software</option>
            <option value="Security" <?php if ($major == "Security") echo "selected"; ?>>Security</option>
            <option value="Business" <?php if ($major == "Business") echo "selected"; ?>>Business</option>
            <option value="Other" <?php if ($major == "Other") echo "selected"; ?>>Other</option>
        </select> <br />
        <hr />
        <p>Queston 1 (25points)</p>
        <p>What does PHP stand for?</p>
        <input type="radio" value="A" name="Q1" <?php if($Q1 == "A") echo "checked"; ?> >A. Private Web page <br />
        <input type="radio" value="B" name="Q1"<?php if($Q1 == "B") echo "checked"; ?>>B. PHP: Hypertext Preprocessor
        <span class="required">
            <?php
            if (isset($_POST["submit"])) {
                // If fields are empty display the name is required
                if (empty($name)) {
                    $nameMSG = "A name is required!";
                }

                // If fields are empty display the Email is required
                if (empty($email)) {
                    $emailMSG = "An email is required!";
                } else if ($_POST["showanswer"] == "YES") {
                    echo "<== This is the correct answer";
                }
            }
            ?>
        </span><br />
        <input type="radio" value="C" name="Q1" <?php if($Q1 == "C") echo "checked"; ?> >C. Personal Hypertext Processor<br />
        <input type="radio" value="D" name="Q1" <?php if($Q1 == "D") echo "checked"; ?> >D. Private Home Page<br />
        <hr />
        <p>Queston 2 (25points)</p>
        <p>How do you display text to the webpage?</p>
        <input type="radio" value="A" name="Q2" <?php if($Q2 == "A") echo "checked"; ?> >A. echo
        <span class="required">
            <?php
            if (isset($_POST["submit"])) {
                // If fields are empty display the name is required
                if (empty($name)) {
                    $nameMSG = "A name is required!";
                }

                // If fields are empty display the Email is required
                if (empty($email)) {
                    $emailMSG = "An email is required!";
                } else if ($_POST["showanswer"] == "YES") {
                    echo "<== This is the correct answer";
                }
            }
            ?>
        </span><br />
        <input type="radio" value="B" name="Q2" <?php if($Q2 == "B") echo "checked"; ?> >B. display<br />
        <input type="radio" value="C" name="Q2" <?php if($Q2 == "C") echo "checked"; ?>>C. System.print<br />
        <input type="radio" value="D" name="Q2" <?php if($Q2 == "D") echo "checked"; ?> >D. post<br />
        <hr />
        <p>Queston 3 (25points)</p>
        <p>When declaring a variable, what symbol is required?</p>
        <input type="radio" value="A" name="Q3" <?php if($Q3 == "A") echo "checked"; ?> >A. *<br />
        <input type="radio" value="B" name="Q3" <?php if($Q3 == "B") echo "checked"; ?> >B. #<br />
        <input type="radio" value="C" name="Q3" <?php if($Q3 == "C") echo "checked"; ?> >C. var<br />
        <input type="radio" value="D" name="Q3" <?php if($Q3 == "D") echo "checked"; ?> >D. $
        <span class="required">
            <?php
            if (isset($_POST["submit"])) {
                // If fields are empty display the name is required
                if (empty($name)) {
                    $nameMSG = "A name is required!";
                }

                // If fields are empty display the Email is required
                if (empty($email)) {
                    $emailMSG = "An email is required!";
                } else if ($_POST["showanswer"] == "YES") {
                    echo "<== This is the correct answer";
                }
            }

            ?>
        </span><br />
        <hr />
        <p>Queston 4 (25points)</p>
        <p> Echo is the only way to output text in php?</p>
        <input type="radio" value="A" name="Q4" <?php if($Q4 == "A") echo "checked"; ?> > TRUE <br />
        <input type="radio" value="B" name="Q4" <?php if($Q4 == "B") echo "checked"; ?> > FALSE
        <span class="required">
            <?php
            if (isset($_POST["submit"])) {
                // If fields are empty display the name is required
                if (empty($name)) {
                    $nameMSG = "A name is required!";
                }

                // If fields are empty display the Email is required
                if (empty($email)) {
                    $emailMSG = "An email is required!";
                } else if ($_POST["showanswer"] == "YES") {
                    echo "<== This is the correct answer";
                }
            }
            ?>
        </span><br />
        <hr />
        <input type="checkbox" name="showanswer" value="YES" <?php if ($_POST["showanswer"] == "YES") echo "checked"; ?>> Show correct answers after submission.
        <br /><br />
        <input type="submit" value="Submit this test" name="submit">
        <input type="submit" name="reset" value="Reset">
    </form>
    <hr />
    <?php

    if (isset($_POST["submit"])) {
        // If fields are empty display the name is required
        if (empty($name)) {
            $nameMSG = "A name is required!";
        }

        // If fields are empty display the Email is required
        if (empty($email)) {
            $emailMSG = "An email is required!";
        } else {

            echo "<hr/>";
            echo "Your test results: <br/>";
            echo "Name: " . $name . "<br/>";
            echo "Email: " . $email . "<br/>";
            echo "Major: " . $major . "<br/>";
            echo "Your grade for this test is: " . round($score, 1) . "<br/>";
        }
    }
    ?>
</body>

</html>