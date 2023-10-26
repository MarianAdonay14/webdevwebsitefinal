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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $activityID = $conn->real_escape_string($_GET['id']);

    // SQL query to delete the activity (using prepared statement)
    $delete_query = $conn->prepare("DELETE FROM activities WHERE id=?");
    $delete_query->bind_param("i", $activityID);

    if ($delete_query->execute()) {
        // Redirect back to the activity viewer page after successful deletion
        header("Location: activity_viewer.php");
        exit();
    } else {
        echo "Error deleting activity: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
      body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        a {
            color: blue;
            text-decoration: none;
            margin-left: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .edit-button {
            padding: 8px 16px;
            font-size: 14px;
        }
        .edit-button:hover {
            background-color: #e0e0e0;
        }
        .edit-button.disabled {
            pointer-events: none;
            background-color: #ccc;
        }
    </style>
</head>
<body>

<h1>Activities</h1>

<table>
    <tr>
        <th>Activity Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Location</th>
        <th>OOTD</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
    $select_query = "SELECT id, activityName, activityDate, activityTime, activityLocation, ootd FROM activities ORDER BY activityDate ASC";
    $result = $conn->query($select_query);

    if ($result === FALSE) {
        echo "Error fetching activities: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['activityName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['activityDate']) . "</td>";
            echo "<td>" . htmlspecialchars($row['activityTime']) . "</td>";
            echo "<td>" . htmlspecialchars($row['activityLocation']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ootd']) . "</td>";
            echo "<td><button onclick=\"editActivity(" . $row['id'] . ")\" class=\"edit-button\">Edit</button></td>";
            echo "<td><button onclick=\"deleteActivity(" . $row['id'] . ")\" class=\"edit-button\">Delete</button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No activities found.</td></tr>";
    }
    ?>

</table>

<script>
    function editActivity(activityId) {
        window.location.href = "edit_activity.php?id=" + activityId;
    }

    function deleteActivity(activityId) {
        if (confirm("ARE YOU SURE YOU WANT TO DELETE THIS ACTIVITY?")) {
            window.location.href = "delete_activity.php?id=" + activityId;
        }
    }
    
</script>
</body>
</html>
