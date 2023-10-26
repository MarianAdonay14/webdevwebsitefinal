<!DOCTYPE html>
<html>
<head>
    <title>Edit Activity</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    width: 50%;
    margin: 0 auto;
}

form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    margin-right: 10px;
    cursor: pointer;
    text-align: center;
}

button:hover {
    background-color: #e0e0e0;
}

button:active {
    background-color: #ccc;
}
</style>
<body>
    <h2>Edit Activity</h2>

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

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Check if the activityID is set and is a valid number
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $activityID = $_GET['id'];

            // Fetch activity details
            $select_query = "SELECT * FROM activities WHERE id=$activityID";
            $result = $conn->query($select_query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $activityName = $row["activityName"];
                $activityDate = $row["activityDate"];
                $activityTime = $row["activityTime"];
                $activityLocation = $row["activityLocation"];
                $ootd = $row["ootd"];
            } else {
                echo "Activity not found.";
            }
        } else {
            echo "Invalid activityID provided.";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the activityID is set and is a valid number
        if (isset($_POST['activityID']) && is_numeric($_POST['activityID'])) {
            $activityID = $_POST['activityID'];
            $activityName = $_POST['activityName'];
            $activityDate = $_POST['activityDate'];
            $activityTime = $_POST['activityTime'];
            $activityLocation = $_POST['activityLocation'];
            $ootd = $_POST['ootd'];

            // Prepare the SQL statement using a prepared statement
            $stmt = $conn->prepare("UPDATE activities SET 
                                    activityName=?, 
                                    activityDate=?, 
                                    activityTime=?, 
                                    activityLocation=?, 
                                    ootd=? 
                                    WHERE id=?");

            // Bind parameters
            $stmt->bind_param("sssssi", $activityName, $activityDate, $activityTime, $activityLocation, $ootd, $activityID);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Activity updated successfully.";
            } else {
                echo "Error updating activity: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Invalid activityID provided.";
        }
    }

    // Close the connection
    $conn->close();
    ?>

    <form action="" method="post">
        Activity Name: <input type="text" name="activityName" value="<?php echo isset($activityName) ? $activityName : ''; ?>"><br>
        Date: <input type="date" name="activityDate" value="<?php echo isset($activityDate) ? $activityDate : ''; ?>"><br>
        Time: <input type="time" name="activityTime" value="<?php echo isset($activityTime) ? $activityTime : ''; ?>"><br>
        Location: <input type="text" name="activityLocation" value="<?php echo isset($activityLocation) ? $activityLocation : ''; ?>"><br>
        OOTD: <input type="text" name="ootd" value="<?php echo isset($ootd) ? $ootd : ''; ?>"><br>
        <input type="hidden" name="activityID" value="<?php echo isset($activityID) ? $activityID : ''; ?>">
        <input type="submit" value="Save">
    </form>
</body>
</html>
