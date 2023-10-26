<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $activityID = $conn->real_escape_string($_GET['id']);

    // SQL query to delete the activity (using prepared statement)
    $delete_query = $conn->prepare("DELETE FROM activities WHERE id=?");
    $delete_query->bind_param("i", $activityID);

    if ($delete_query->execute()) {
        // Redirect back to the activity viewer page after successful deletion
        header("Location: user.php");
        exit();
    } else {
        echo "Error deleting activity: " . $conn->error;
    }
} else {
    echo "Invalid activity ID.";
}

$conn->close();
?>
