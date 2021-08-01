<html>

<body>
    <!--Action to avoid hard coding-->
    <form action="<?php echo $_PHP_SELF; ?>" method="get">
        Name: <input type="text" name="name" value="Mike"><br />
        Email: <input type="email" name="email"><br />

        <!--Dropdown Menu for user to pick-->
        Your favorite fruit: <br />
        <select name="fruit">
            <option value="Orange">Orange</option>
            <option value="Apple">Apple</option>
            <option value="Kiwi">Kiwi</option>
            <option value="Lemon">Lemon</option>
            <option value="Other">Other</option>
        </select>
        <br />

        <!--Add text box for comments-->
        Comments:<br>
        <textarea rows=5 cols=50 name="comments" placeholder="Your comments please"></textarea>
        <br /><br />

        <!--CheckBox-->
        <input type=checkbox name=showComments value="yes" checked>
        Show my commenrs after submission
        <br /><br />
        <input type="submit" name="submit" value="Submit Info">
        <input type="reset" name="reset" value="Reset Me">
    </form>
    <hr />
    <?php
    // Function to prevent malitious scripts from being run
    function validate_input($input)
    {
        $input = trim($input); //ltrim, rtrim for left and right trim
        $input = htmlspecialchars($input);

        return $input;
    }

    // If statement to run when buton pressed
    if (isset($_GET["submit"])) {
        // Save the entered information
        $name = validate_input($_GET["name"]);
        $email = validate_input($_GET["email"]);

        // Echo text output
        echo "<hr/>";
        echo "Your provided name is: " . $name . "<br/>";
        echo "Your provided email is: " . $email . "<br/>";

        // Echo dropdown output
        $fruit = validate_input($_GET["fruit"]);
        echo "Your favorite fruit is: " . $fruit . "<br/>";

        // Echo TextBox
        $comments = validate_input($_GET["comments"]);
        if ($_GET["showComments"] == "yes")
            echo "Your comments are: <pre>" . $comments . "</pre><br/>"; // <pre> keeps original format when submitted
        else
            echo "You chose not to displah your comments.<br/>";
    }
    ?>
    <hr />
    <h1>Welcome to this online test!</h1>
    <form action="<?php echo $_PHP_SELF ?>" method=post>

        Question 1. What is 1+1? <br />
        <input type="radio" name="Q1" value="A" A>A. 0<br />
        <input type="radio" name="Q1" value="B" A>B. 1<br />
        <input type="radio" name="Q1" value="C" A>C. 2<br />
        <input type="radio" name="Q1" value="D" A>D. 3<br />
        <hr />

        Question 2. What is 2*3? <br />
        <input type="radio" name="Q2" value="A">A. 4<br />
        <input type="radio" name="Q2" value="B">B. 6<br />
        <input type="radio" name="Q2" value="C">C. 8<br />
        <input type="radio" name="Q2" value="D">D. 10<br />
        <hr />

        Question 3. What is GGC located? <br />
        <input type="radio" name="Q3" value="A">A. NY<br />
        <input type="radio" name="Q3" value="B">B. CA<br />
        <input type="radio" name="Q3" value="C">C. FL<br />
        <input type="radio" name="Q3" value="D">D. GA<br />
        <hr />

        Question 4. What is GGCs Mascot? <br />
        <input type="radio" name="Q4" value="A">A. Black Bear<br />
        <input type="radio" name="Q4" value="B">B. Eagle<br />
        <input type="radio" name="Q4" value="C">C. Grizzly Bear<br />
        <input type="radio" name="Q4" value="D">D. Bee<br />
        <hr />

        <!--Submit-->
        <input type=submit name=submitTest value="Submit Test"><br />
    </form>

    <?php
    if (isset($_POST["submitTest"])) {
        $score = 0;
        $nq = 4;        // Total number of questions
        $ppq = 100 / $nq; //divide by questions

        // Compare the answers taken from user
        if ($_POST["Q1"] == "C")
            $score += $ppq;
        if ($_POST["Q2"] == "B")
            $score += $ppq;
        if ($_POST["Q3"] == "D")
            $score += $ppq;
        if ($_POST["Q4"] == "C")
            $score += $ppq;

        // Send grade
        echo "Your grade for this test is: " . round($score, 1) . "<br/>";
    }
    ?>

</body>

</html>