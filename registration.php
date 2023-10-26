<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $role = $_POST['role'];
    $status = $_POST['active'];
    $address = $_POST['address'];

    // Assign role based on email condition
    $role = ($_POST['role'] === 'admin') ? 'admin' : 'user';

    $sql = "INSERT INTO users (fullName, email, password, age, address, role, status) 
            VALUES ('$fullName', '$email', '$password', '$age', '$address', '$role','$status')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to the landing page
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
