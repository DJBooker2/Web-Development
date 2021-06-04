<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <h1 align=center>Student Fruit Survey</h1>
    <hr />

    <?php
    //Variables to hold user information
    $name = $email = $address = $fruit = $fruitDay = "";
    $nameMSG = $emailMsg = "";

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
        $address = validate_input($_POST["address"]);
        $fruitDay = validate_input($_POST["howMany"]);
        $fruit = validate_input($_POST["favFruit"]);



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

    <form action="<?php echo $_PHP_SELF; ?>" method=post>
        <table style="background-color:pink;width:50%;margin:auto;">
            <tr>
                <td align=right>Name</td>
                <td> <input type="text" name="name" value="<?php echo $name; ?>"> <span class='error'>*<?php echo $nameMSG; ?></span><br /></td>
            </tr>
            <tr>
                <td align=right>Address</td>
                <td> <input type="text" name="address" value="<?php echo $address; ?>"></td>
            </tr>
            <tr>
                <td align=right>Email</td>
                <td> <input type="text" name="email" value="<?php echo $email; ?>"> <span class='error'>* <?php echo $emailMSG; ?></span></td>
            </tr>

            <tr>
                <td align=right>How many pieces of fruit do you eat per day? </td>
                <td><input type="radio" name="howMany" value="zero" <?php if ($fruitDay == "zero") echo "checked"; ?>> 0
                    <input type="radio" name="howMany" value="one" <?php if ($fruitDay == "one") echo "checked"; ?>> 1
                    <input type="radio" name="howMany" value="two" <?php if ($fruitDay == "two") echo "checked"; ?>> 2
                    <input type="radio" name="howMany" value="twoplus" <?php if ($fruitDay == "twoplus") echo "checked"; ?>> More than 2
                </td>
            </tr>

            <tr>
                <td align=right>Your favorite fruit is:</td>
                <td><select name="favFruit">
                        <option value="apple" <?php if ($fruit == "apple") echo "selected"; ?> selected>Apple</option>
                        <option value="banana" <?php if ($fruit == "banana") echo "selected"; ?>>Banana</option>
                        <option value="plum" <?php if ($fruit == "plum") echo "selected"; ?>>Plum</option>
                        <option value="pomegranate" <?php if ($fruit == "pomegranate") echo "selected"; ?>>Pomegranate</option>
                        <option value="strawberry" <?php if ($fruit == "strawberry") echo "selected"; ?>>Strawberry</option>
                        <option value="watermelon" <?php if ($fruit == "watermelon") echo "selected"; ?>>Watermelon</option>
                        <option value="other" <?php if ($fruit == "other") echo "selected"; ?>>other</option>
                    </select> </td>
            </tr>


            <tr>
                <td align=right>Would you like a brochure? </td>
                <td> <input type="checkbox" name="brochure" value="Yes" <?php if ($_POST["brochure"] == "Yes") echo "checked" ?>> </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"> </td>
            </tr>
        </table>
    </form>

    <hr />
    <?php
    // Handle if the submit button is pressed
    if (isset($_POST["submit"])) {
        if ($_POST["name"] == NULL) {
            echo "Missing infomation is required. Please fill in before submit!<br/>";
        } else {
            echo "<hr/>";
            echo "Here is your input:<br/>";
            echo "Your name is: " . $name . "<br/>";
            echo "Your address is: " . $address . "<br/>";
            echo "Your email is: " . $email . "<br/>";
            echo "Your eat two pieces of fruit each day: " . $fruitDay . "<br/>";
            echo "Your favorite fruit is : " . $fruit . "<br/>";
        }

        if ($_POST["brochure"] == "Yes") {
            echo "You would like a brochure.";
        } else {
            echo "You do not want a brochure.";
        }
    }


    ?>

</body>

</html>