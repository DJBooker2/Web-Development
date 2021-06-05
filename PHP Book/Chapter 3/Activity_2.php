<!--
Programmed By: DJ Booker
June 4, 2021
Create a program which uses a conditional statement that will determine what color is contained in a string.
-->

<!--#1-->
<html>
<title> Example 1 </title>
<br />
<!--Center Heading-->
<h1 style="text-align: center;"> Example 1</h1>
<br />
<hr />
<h1>#1</h1>
<hr />
<br />

<body>
    <?php
    // Variables
    $favColor = $colorMSG = "";

    // Function to prevent malicious scripts from being run
    function validate_input($input)
    {
        $input = trim($input); //ltrim, rtrim for left and right trim
        $input = htmlspecialchars($input);

        return $input;
    }

    // Handle submit button when pressed
    if (isset($_POST["submit"])) {
        // Pass in info entered by user
        $name = validate_input($_POST["color"]);
        // Check to see if the box is empty
        if (empty($name)) {
            $colorMSG = "Please enter a color";
        }
        // If the color is green, display “I love the earth”.
        elseif ($name == "green") {
            $colorMSG = "I love the earth";
        }
        // If the color is blue, display “The sky is beautiful”.
        elseif ($name == "blue") {
            $colorMSG = "The sky is beautiful";
        }
        // If the color is yellow or orange, display “I love sunsets”.
        elseif ($name == "orange") {
            $colorMSG = "I love sunsets";
        }
        // For any other color, display “selected color is my favorite color”.
        else {
            $colorMSG = "$name " . " is my favorite color";
        }
        // Replacing the selected color with the color chosen.
        $favColor = $name;
    }


    ?>

    <form method="post" action="<?php echo $_PHP_SELF; ?>">
        <!--Textbox for -->
        Name: <input type=text name=color value="<?php echo $favColor; ?>">
        <span class=required>*</span> <br /><br />

        <!--Submit and reset buttons-->
        <input type=submit name=submit value=submit>
        <input type=reset name=reset value=reset>
    </form>

    <?php
    echo "<hr/>";
    echo $colorMSG;
    ?>
</body>
<br />
<br />
<hr />
<h1>#2</h1>
<hr />
<br />

</html>