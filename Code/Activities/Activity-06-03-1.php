<html>

<head>
    <style>
        .required {
            color: red;
        }
    </style>
</head>

<body>
    <?php

    //Variables to hold user information
    $name = $email = $phone = $gender = $comments = $timeChoice = "";
    $nameMSG = $emailMSG = $phoneMSG = $genderMSG = "";

    // Function to prevent malitious scripts from being run
    function validate_input($input)
    {
        $input = trim($input); //ltrim, rtrim for left and right trim
        $input = htmlspecialchars($input);

        return $input;
    }

    // Handle submit button when pressed
    if (isset($_POST["submit"])) {
        // Pass in info enterd by user
        $name = validate_input($_POST["name"]);
        $email = validate_input($_POST["email"]);
        $phone = validate_input($_POST["phone"]);
        $gender = validate_input($_POST["gender"]);
        $comments = validate_input($_POST["comments"]);
        $timeChoice = validate_input($_POST["time"]);


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

        // If fields are empty display the Email is required
        if (empty($phone)) {
            $phoneMSG = "A phone number is required!";
        } else {
            // Check if the email is a valid email address
            if (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
                $phoneMSG = "phone format must contain digits!";
            }
        }

        if (empty($gender)) {
            $genderMSG = "Gender info is required";
        }
    }
    ?>
    <form method="post" action="<?php echo $_PHP_SELF; ?>">
        <!--Textbox for name-->
        Name: <input type=text name=name value="<?php echo $name; ?>">
        <span class=required>* <?php echo $nameMSG; ?> </span> <br /><br />

        <!--Textbox for email and to keep the selected value-->
        Email: <input type=text name=email value="<?php echo $email; ?>">
        <span class=required> * <?php echo $emailMSG; ?> </span> <br /><br />

        <!--Textbox for Phone and to keep the selected value-->
        Phone: <input type=text name=phone value="<?php echo $phone; ?>">
        <span class=required> * <?php echo $phoneMSG; ?> </span> <br /><br />

        <!--Radio buttons for gender and to keep the selected value-->
        Gender: <input type=radio name=gender value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female
        <input type=radio name=gender value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
        <span class=required> * <?php echo $genderMSG ?></span><br /><br />

        <!--Comment Text Area-->
        Comments: <textarea name=comments rows=5 cols=50><?php echo $comments; ?></textarea><br /><br />

        <!--Dropdown Menu-->
        Your preferred time:
        <select name="time">
            <option value="AM" <?php if ($timeChoice == "AM") echo "selected"; ?>>Morning</option>
            <option value="PM" <?php if ($timeChoice == "PM") echo "selected"; ?>>Afternoon</option>
            <option value="EV" <?php if ($timeChoice == "EV") echo "selected"; ?>>Evening</option>
        </select><br /><br />

        <!--Submit and reset buttons-->
        <input type=submit name=submit value=submit>
        <input type=reset name=reset value=reset>
    </form>
    <?php
    echo "<hr/>";
    echo "Here is your input:<br/>";
    echo "Your name is: " . $name . "<br/>";
    echo "Your email is: " . $email . "<br/>";
    echo "Your phone number is: " . $phone . "<br/>";
    echo "Your gender is: " . $gender . "<br/>";
    echo "Your comments are: " . $comments . "<br/>";
    echo "Your preferred time choice is: " . $timeChoice . "<br/>";
    ?>
</body>

</html>