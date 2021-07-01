<!--
    Programmed By: DJ Booker
    July 1, 2021
    This program will demonstrate
-->

<html>

<head>
    <title>
        Database lab
    </title>
</head>

<body>


    <H1>Please provide the information about your product:</h1>
    <form action="<?php echo $_PHP_SELF ?>" method="get">
        Product's name:
        <input type="text" name="name">
        <font color=red>*</font><br /><br />
        Product's maker:
        <input type="text" name="maker"><br /><br />
        Product's amount:
        <input type="text" name="amount"><br /><br />
        Product's price:
        <input type="text" name="price"><br /><br />
        <input type="submit" value="Add Record" name="add">
        <input type="submit" value="Find the Item with the Highest Price" name="highest">
        <input type="submit" value="Display All" name="displayAll"><br /><br />
        <input type="submit" value="Group by Maker" name="groupByMaker">
        <input type="submit" value="Sort Items by Amount Descending" name="sort">
        <input type="submit" value="Find the Average Price of all items" name="average"><br /><br />
        <input type="submit" value="Delete Record by ID" name="delete"> ID to remove: <input type="text" name="id"><br /><br />
        <input type="submit" value="Show by Maker" name="showByMaker"> Maker: <input type="text" name="maker2show"><br /><br />
    </form>

    <hr />
    <?php
    require_once "My-DB-Functions.php";
    $conn = My_Connect_DB();
    mysqli_close($conn); //close the connection to the DB
    $conn = My_Connect_DB();
    if (isset($_REQUEST["add"])) {
        if ($_REQUEST["name"] == "") {
            echo "name is required";
            return;
        }
        $sql = $sql = "INSERT INTO Database_Lab(name, maker, amount, price) 
		VALUES('" . $_REQUEST["name"] . "', '" . $_REQUEST["maker"] . "', '" . $_REQUEST["amount"] . "', '" . $_REQUEST["price"] . "')";
        My_SQL_EXE($conn, $sql);
        $sql = "SELECT * FROM Database_Lab";
        Run_Select_Show_Result($conn, $sql);
    }

    if (isset($_REQUEST["highest"])) {
        $sql = "SELECT name, maker, amount, price FROM Database_Lab
        WHERE price IN (SELECT max(price) FROM Database_Lab);";
        Run_Select_Show_Result($conn, $sql);
    }

    if (isset($_REQUEST["displayAll"])) {
        $sql = "SELECT * FROM Database_Lab";
        Run_Select_Show_Result($conn, $sql);
    }

    if (isset($_REQUEST["groupByMaker"])) {
        $sql = "SELECT maker, SUM(amount) AS 'TotalItem'
    			FROM Database_Lab GROUP BY maker
                ORDER BY TotalItem DESC;";
        Run_Select_Show_Result($conn, $sql);
    }

    if (isset($_REQUEST["sort"])) {
        $sql = "SELECT * FROM Database_Lab ORDER BY amount DESC;"; //DESC
        Run_Select_Show_Result($conn, $sql);
    }

    if (isset($_REQUEST["average"])) {
        $sql = "SELECT round(AVG(price),2) AS 'Average Price' FROM Database_Lab;";
        Run_Select_Show_Result($conn, $sql);
    }

    if (isset($_REQUEST["delete"])) {
        $sql = "DELETE FROM Database_Lab WHERE id='" . $_REQUEST["id"] . "';";
        My_SQL_EXE($conn, $sql);
        $sql = "SELECT * FROM Database_Lab;";
        Run_Select_Show_Result($conn, $sql);
    }

    if (isset($_REQUEST["showByMaker"])) {
        $sql = "SELECT * FROM Database_Lab WHERE maker IN (SELECT '" . $_REQUEST["maker2show"] . "' FROM Database_Lab);";
        Run_Select_Show_Result($conn, $sql);
    }
    ?>
</body>

</html>