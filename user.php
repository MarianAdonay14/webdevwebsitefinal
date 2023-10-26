<?php
session_start();

// Check if the user is authenticated
if ($_SESSION["role"] !== "user") {
    header("Location: first.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: white;
    
}

 .logout-button{
    opacity: 0.5;
    padding: 10px;
    text-align: center;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    margin-top: 20px;
 } 
 
 
 
 
 .content{
    opacity: 0.5;
    padding: 20px;
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    margin-top: 20px;
    back
    
}
.footer {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    position: fixed;
    bottom: 0;
    width: 100%;
    left:0;
}
h2, ul {
      text-align: center;
      color:black;
    }


.dropdown-menu {
    list-style: none;
    padding: 0;
}

.dropdown-menu li {
    position: relative;
    display: inline-block;
}
.dropdown-item {
    padding: 10px;
    display: block;
    text-decoration: none;
    color: black;
    background-color: white;
    border: none;
    padding: 5px 5px;
    margin-top: 5px;
    cursor: pointer;
    border-radius: 5px;
    
}

.dropdown-item:hover {
    background-color: #eaeaea;
}

.logout-button {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 20px 20px;
    margin-top: 60px;
    cursor: pointer;
    border-radius: 5px;
    float: right; 
}

.logout-button:hover {
    background-color: #c0392b;
    
}
/* Styles for the modal */
.modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      padding-top: 60px;
      font-style: georgia;
      background-color: white;
    }

    .modal-content {
      background-color:#808081;
      margin: 5% auto;
      padding: 10px;
      border: 6px solid #333333;
      width: 60%;
      font-size: 20px;
      font-weight: bold;
      
     
    }

    /* Close button style */
    .close {
      color: white;
      float: right;
      font-size: 30px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      border-radius:5px;
    }
    .add-activity-button {
  background-color: black; 
  color: white;             
  border: none;             
  padding: 10px 20px;       
  cursor: pointer;          
  border-radius: 5px;      
}

.add-activity-button:hover {
  background-color: black;
}
.dropdown-item {
    background-color: black; 
  color: white;             
  border: none;             
  padding: 10px 20px;       
  cursor: pointer;          
  border-radius: 5px; 
}

.dropdown-item:hover {
  background-color: grey; 
}
    </style>
</head>
<body>

    <div class="content">
        <h2>Welcome to the user page!</h2>
        <ul class="dropdown-menu">
        

    <div id="myModal" class="modal">
    <div class="modal-content">
    <span class="close" onclick="closeForm()">&times;</span>
    <h3>Add Activity</h3>
    <form action="add_activity.php" method="post">
      <label for="activityName">Activity Name:</label><br>
      <input type="text" id="activityName" name="activityName"><br>
      <label for="activityDate">Date:</label><br>
      <input type="date" id="activityDate" name="activityDate"><br>
      <label for="activityTime">Time:</label><br>
      <input type="time" id="activityTime" name="activityTime"><br>
      <label for="activityLocation">Location:</label><br>
      <input type="text" id="activityLocation" name="activityLocation"><br>
      <label for="ootd">Outfit of the Day (OOTD):</label><br>
      <input type="text" id="ootd" name="ootd"><br><br>
      <input type="submit" value="Submit">
    </form>
    </div>

    </div>
        <ul>
        <button class="add-activity-button" onclick="openForm()">Add Activity</button>

            <li><a class="dropdown-item" href="user_page.html">View Announcement</a></li>
            <!-- <li><a class="dropdown-item" href="#set_activities">Set Activity</a></li> -->
        </ul>
    </div>
 
    
<script>
  function openForm() {
    document.getElementById("myModal").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myModal").style.display = "none";
  }
</script>

</body>
</html>

<form action="logout.php" method="post">
    <button type="submit" class="logout-button">Logout</button>
</form>
    <div class="footer">
        Marian Batuta Company
    </div>

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
    font-family: roboto;
}

h1 {
    text-align: left;
    margin-bottom: 40px;
    
}

table {
    width: 70%;
    border-collapse: collapse;
}

th, td {
    border: 3px solid #ccc;
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

.edit-button, .remarks-button {
    font-size: 14px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    margin-right: 5px;
}

.edit-button {
    padding: 8px 16px;
}

.edit-button:hover {
    background-color: #e0e0e0;
}

.edit-button.disabled {
    pointer-events: none;
    background-color: #ccc;
}

.remarks-button {
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    margin-right: 5px;
    background-color: #3498db;
    color: #fff;
}

.done-button {
    background-color: black; 
    padding: 8px 16px;
}

.cancel-button {
    background-color: black; 
    padding: 8px 16px;
    

}


    </style>
</head>
<body>

<!DOCTYPE html>
<html>
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
            <th>REMARKS</th>
        </tr>

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

        $select_query = "SELECT id, activityName, activityDate, activityTime, activityLocation, ootd FROM activities ORDER BY activityDate ASC";
        $result = $conn->query($select_query);

        if ($result === FALSE) {
            echo "Error fetching activities: " . $conn->error;
        } elseif ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr id='activityRow_" . $row['id'] . "'>";
                echo "<td>" . htmlspecialchars($row['activityName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['activityDate']) . "</td>";
                echo "<td>" . htmlspecialchars($row['activityTime']) . "</td>";
                echo "<td>" . htmlspecialchars($row['activityLocation']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ootd']) . "</td>";
                echo "<td><button onclick=\"editActivity(" . $row['id'] . ")\" class=\"edit-button\">Edit</button></td>";
                echo "<td><button onclick=\"deleteActivity(" . $row['id'] . ")\" class=\"edit-button\">Delete</button></td>";
                echo "<td>";
                echo "<button onclick=\"doneActivity(" . $row['id'] . ")\" class=\"remarks-button done-button\">Done Activity</button>";
                echo "<button onclick=\"cancelActivity(" . $row['id'] . ")\" class=\"remarks-button cancel-button\">Cancel Activity</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No activities found.</td></tr>";
        }
        ?>

    </table>

    <div id="remarks-section"></div>

    <script>
        function editActivity(activityId) {
        window.location.href = "edit_activity.php?id=" + activityId;
    }

    function deleteActivity(activityId) {
        if (confirm("ARE YOU SURE YOU WANT TO DELETE THIS ACTIVITY?")) {
            window.location.href = "delete_activity.php?id=" + activityId;
        }
    }

    function doneActivity(activityId) {
        var row = document.getElementById('activityRow_' + activityId);
        if (row) {
            row.style.backgroundColor = "#27ae60"; // Green
        }
        alert("GOOD JOB! The activity is done.");
    }

    function cancelActivity(activityId) {
        if (confirm("Are you sure you want to cancel the activity?")) {
            var row = document.getElementById('activityRow_' + activityId);
            if (row) {
                row.style.backgroundColor = "#e74c3c"; // Red
            }
            alert("The activity will be confirmedly canceled if you click OK!");
        }
    }
    </script>
</body>

</html>

