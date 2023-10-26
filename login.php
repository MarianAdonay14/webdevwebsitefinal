<!DOCTYPE html>
<html>
<head>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $entered_email = $_POST['email'];
    $entered_password = $_POST['Password'];  // Adjusted to match the form input name

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss", $entered_email, $entered_password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $_SESSION['email'] = $entered_email;
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>



<style>
body {
  padding: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

form {
  width: 300px;
  background-image: url('announcement.jpg');
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center; /* Center the form content */
  margin-bottom: 20px; /* Add margin at the bottom to create space for the button */
}

input[type="text"], input[type="password"], select {
  width: calc(100% - 22px); /* Adjusted width to account for padding */
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

input[type="submit"], a input[type="button"] {
  width: calc(100% - 22px); /* Adjusted width to account for padding */
  padding: 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"] {
  background-color: lightslategray;
  color: #fff;
}

input[type="submit"]:hover {
  background-color: #d3d3d3;
}

a input[type="button"] {
  width: calc(100% - 5px);
  padding: 12px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  background-color: lightslategray;
  color: #fff;
  text-align: center;
  display: inline-block;
  text-decoration: none;
}

a input[type="button"]:hover {
  background-color: #444;
}

</style>
</head>
<body>
  <form method="POST" action="authenticate.php">
    <label for="Username">Enter Email:</label>
    <input type="text" id="Username" name="email" required><br>
    <label for="Password">Enter Password:</label>
    <input type="password" id="Password" name="Password" required><br>
    <label for="RoleDropdown">Role:</label>
    <select id="RoleDropdown" name="Role">
      <option value="" disabled selected>Select a Role</option>
      <option value="Admin">Admin</option>
      <option value="User">User</option>
    </select><br>
    <label for="Status">Status:</label>
    <input type="text" id="Status" name="Status" required><br>
    <input type="submit" value="Login">
  </form>

  <!-- Redirect to registration.html when clicking the "Register" button -->
  <a href="registration.php">
    <input type="button" value="Register">
  </a>
</body>
</html>

<!-- 
<a href="logout.php">Logout</a> -->
