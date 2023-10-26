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

// Retrieve form data
$activityName = $_POST['activityName'];
$activityDate = $_POST['activityDate'];
$activityTime = $_POST['activityTime'];
$activityLocation = $_POST['activityLocation'];
$ootd = $_POST['ootd'];

// Prepare a SQL statement with placeholders
$sql = "INSERT INTO activities (activityName, activityDate, activityTime, activityLocation, ootd) VALUES (?, ?, ?, ?, ?)";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind parameters and execute the statement
$stmt->bind_param("sssss", $activityName, $activityDate, $activityTime, $activityLocation, $ootd);

if ($stmt->execute()) {
    header("Location: user.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
