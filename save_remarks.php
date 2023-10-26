<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "activity_manager";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $remarks = $_POST["remarks"];

    // Save the remarks to the database
    $insert_query = "INSERT INTO activities (remarks) VALUES ('$remarks')";
    if ($conn->query($insert_query) === TRUE) {
        echo "Remarks saved successfully.";
    } else {
        echo "Error saving remarks: " . $conn->error;
    }
}

$conn->close();
?>