<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    // Now you can use these variables for further processing or database insertion
    // For example:
    // Insert the data into the database, or perform any other necessary actions
}
?>
