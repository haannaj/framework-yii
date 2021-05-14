<?php
// Enable verbose output of error (or include from config.php)
error_reporting(-1);              // Report all type of errors
ini_set("display_errors", 1);     // Display all errors

//För att plocka boatclub.sqlite i connect.php, gör följande steg.

// Create a DSN for the database using its filename
$fileName = __DIR__ . "/yii2basic.sqlite";
$dsn = "sqlite:$fileName";



// Open the database file and catch the exception if it fails.
try {
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed to connect to the database using DSN:<br>$dsn<br>";
    throw $e;
}

return $dsn;