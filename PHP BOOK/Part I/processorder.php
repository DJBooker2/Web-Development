<html>

<head>
    <title>Bob's Auto Parts - Order Results</title>
</head>
<?php
# Create short variable names
$tireqty = $POST['tireqty'];
$oilqty = $POST['oilqty'];
$sparkqty = $POST['sparkqty'];
?>

<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order Results</h2>
    <?php
    echo "<p>Order processed at ";
    #The date()function expects the argument you pass it to be a format string, 
    #represent-ing the style of output you would like.
    echo date('H:i, jS F Y');
    echo '<p>Your order is as follows: </p>';

    # Print out the updated values after the information is entered
    echo $tireqty . ' tires<br />';
    echo $oilqty . ' bottles of oil<br />';
    echo $sparkqty . ' spark plugs<br />';
    echo "</p>";
    ?>
</body>

</html>