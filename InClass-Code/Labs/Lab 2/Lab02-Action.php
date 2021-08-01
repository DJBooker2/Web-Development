<?php
// Function to prevent malitious scripts from being run
function validate_input($input)
{
	$input = trim($input); //ltrim, rtrim for left and right trim
    $input = htmlspecialchars($input);
    
    return $input;
}
	
    // If statement to run when buton pressed
	if( isset($_POST["submit"]))
    {
    	// Save the entered information
    	$name = validate_input($_POST["name"]);
        $email = validate_input($_POST["email"]);
        
        // Echo output
        echo "<hr/>";
        echo "Your provided name is: ".$name."<br />";
        echo "Your provided email is: ".$email."<br />";
        
        // Value to hold income
        $sex = validate_input($_POST["gender"]);
        if($sex == "Male")
        	echo "Your gender is Male.<br/>";
        else if ($sex == "Female")
        	echo "Your gender is Female.<br/>";
        else
        	echo "Your gender will remain hidden.<br/>";
            
        // Area of study
        $study = validate_input($_POST["major"]);
        echo "Your favorite fruit is: ".$study."<br/>";
        
        // Membership
        $membership = validate_input($_POST["years"]);
        echo "You have been a member for: ".$membership." Years<br/>";
        
        // Payment
        if(isset($_POST["submit"]))
    {
        
        // Compare the answers taken from user
    	$vip = validate_input($_POST["vip"]);
        if($vip == "VIP")
            $total = 200;
        else if($vip == "Regular")
            $total = 100;
          else $fee = "n/a";
        if($membership >= 3)
            $total = $total * .7;
        // Send grade
        echo "Your total due : ".round($total,1)."<br/>";
    }
        
    }
