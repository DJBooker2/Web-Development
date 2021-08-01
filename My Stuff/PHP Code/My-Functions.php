<!--
    Programmed By: DJ Booker
    Aug 1, 2021
    This program will hold all of my personal functions
-->

<?php

  //Connect to database
  function Connect_To_Database( $sName, $uName, $pWord, $dbName)
  {
    $servername = $sName; // Server name (localhost)
    $username = $uName; // username for the database (root)
    $password = $pWord; // password for database
    $databaseName = $dbName; // Database name

    // Connect to the Database Server and chech to see if connection is valid
    $connect = mysqli_connect($servername, $username, $password, $databaseName);
    if (!$connect) {
      // Stop query if the conn is not valid
      die("Connection to DB failed: " . mysqli_connect_error() . "<br/>");
    }
    else {
      // Continue connection
      return $connect;
    }
  }
 ?>
