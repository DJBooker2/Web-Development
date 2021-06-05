<?php
// Function to prevent malitious scripts from being run
function validate_input($input)
{
	$input = trim($input); //ltrim, rtrim for left and right trim
    $input = htmlspecialchars($input);
    
    return $input;
}
	
    // If statement to run when buton pressed
	if( isset($_GET["submit"]))
    {
    	// Save the entered information
    	$name = validate_input($_GET["name"]);
        $email = validate_input($_GET["email"]);
        
        // Echo output
        echo "<hr/>";
        echo "Your provided name is: ".$name."<br />";
        echo "Your provided email is: ".$email."<br />";
        
        // Value to hold income
        $income = validate_input($_GET["income"]);
        if($income == "A")
        	echo "Your income is less than 50K.<br/>";
        else if ($income == "B")
        	echo "Your income is more than 50Kbut less than 100K.<br/>";
        else if ($income == "C")
        	echo "Your income is more than 100K.<br/>";
        else
        	echo "Your income is not specified.<br/>";
    }
