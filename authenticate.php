<?php
session_start();
include_once("included/dbaccess/DBUtil.php");

// Check if the form fields are set
if (!isset($_POST["Username"]) || !isset($_POST["Password"])) {
    // Handle the case when form fields are not set
    header("Location: login.html");  // Redirect to a login page
    exit();
}

$username = $_POST["Username"];
$password = $_POST["Password"];

$conn = getConnection();

// Use prepared statements to prevent SQL injection
$sql = "SELECT * FROM users WHERE Email = ? AND Password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Close the prepared statement
$stmt->close();

if ($row) {
    $_SESSION["role"] = $row["role"];
    echo "role: " . $_SESSION["role"];

    if (strtolower($row["role"]) === "admin") { // Use strtolower to ensure case-insensitive comparison
        header("Location: admin.php");
        exit();
    } else if (strtolower($row["role"]) === "user") { // Use strtolower to ensure case-insensitive comparison
        header("Location: user.php");
        exit();
    }
} else {
    // User is not found, redirect to a login page with an error message
    header("Location: login.html?error=1");
    exit();
}


closeConnection();
?>
