<?php
include 'connection.php';


if(isset($_GET['userId'])) {
    $userId = mysqli_real_escape_string($con, $_GET['userId']);

    // Delete the user from the database
    $query = "DELETE FROM users WHERE ID = $userId";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Redirect back to the user list page after successful deletion
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "User ID not provided.";
}

mysqli_close($con);

?>