<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pweb2"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: {$conn->connect_error}");
}

// Query to check if the 'admin' table exists
$tableName = 'admin';
$sql = "SHOW TABLES LIKE '$tableName'";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "Table '$tableName' exists.<br>";

        // Query to fetch all rows from the 'admin' table
        $fetchSql = "SELECT * FROM $tableName";
        $fetchResult = $conn->query($fetchSql);

        if ($fetchResult && $fetchResult->num_rows > 0) {
            echo "Contents of the '$tableName' table:<br>";
            while ($row = $fetchResult->fetch_assoc()) {
                echo "<pre>" . print_r($row, true) . "</pre>";
            }
        } else {
            echo "The '$tableName' table is empty or the query failed.";
        }
    } else {
        echo "Table '$tableName' does not exist.";
    }
} else {
    echo "Query failed: {$conn->error}";
}

$conn->close();