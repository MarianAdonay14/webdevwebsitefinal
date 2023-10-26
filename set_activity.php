<!DOCTYPE html>
<html>
<head>
  <title>Activity Viewer</title>
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
    .status-buttons button {
      margin-right: 10px;
      padding: 8px 16px;
      font-size: 14px;
    }
    .status-buttons button:hover {
      background-color: #e0e0e0;
    }
    .remarks-input {
      padding: 8px;
      width: 60%;
    }
    .edit-button {
      padding: 8px 16px;
      font-size: 14px;
    }
    .edit-button:hover {
      background-color: #e0e0e0;
    }
    /* Modal styles */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);
  padding-top: 60px;
}

.modal-content {
  background-color: #fefefe;
  margin: 5% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
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
    <th>Actions</th>
  </tr>
  <div id="remarksModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeRemarksModal()">&times;</span>
    <h2>Enter Remarks</h2>
    <textarea id="remarksInput" class="remarks-input" placeholder="Enter remarks..."></textarea>
    <button onclick="saveRemarks()">Save Remarks</button>
  </div>
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

  // Function to display activities
  function displayActivities($conn) {
      // Modify the SQL query to select the correct column names and order by date
      $select_query = "SELECT id, activityName, activityDate, activityTime, activityLocation, ootd FROM activities ORDER BY activityDate ASC";
      $result = $conn->query($select_query);

      if ($result === FALSE) {
          echo "Error fetching activities: " . $conn->error;
      } elseif ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr id='activityRow_" . $row["id"] . "'>";
              echo "<td>" . $row["activityName"] . "</td>";
              echo "<td>" . $row["activityDate"] . "</td>";
              echo "<td>" . $row["activityTime"] . "</td>";
              echo "<td>" . $row["activityLocation"] . "</td>";
              echo "<td>" . $row["ootd"] . "</td>";
              echo '<td class="status-buttons">';
              echo '<button onclick="updateStatus(' . $row["id"] . ', \'Done\')">Done</button>';
              echo '<button onclick="updateStatus(' . $row["id"] . ', \'Cancel\')">Cancel</button>';
              echo '<button onclick="showRemarksInput(' . $row["id"] . ')">Remark</button>';

              echo "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No activities found.</td></tr>";
      }
  }

  // Call the function to display activities
  displayActivities($conn);

  // Close the PHP block to add JavaScript
  ?>
  
  <script>
function updateStatus(activityId, status) {
  if (status === 'Cancel') {
    var confirmation = confirm('Do you want to cancel this activity?');
    if (!confirmation) {
      return;
    }
    status = 'Cancelled';
  } else if (status === 'Done') {
    alert('Nice, the activity is already done');
    // Change the background color to green for "Done" status
    var row = document.getElementById('activityRow_' + activityId);
    if (row) {
      row.style.backgroundColor = '#00ff00'; // Change to green color for "Done" status
    }
    return;
  }

  var message = status === 'Done' ? 'Nice, the activity is already done' : 'The activity status is updated';
  alert(message);

  var row = document.getElementById('activityRow_' + activityId);
  if (row && status !== 'Done') {
    if (status === 'Cancelled') {
      row.style.backgroundColor = '#ff9999';
      var cancelButton = row.querySelector('button:nth-child(3)');
      if (cancelButton) {
        cancelButton.innerHTML = 'Cancelled';
        cancelButton.disabled = true;
      }
    }
  }
}
function showRemarksInput(activityId) {
  var modal = document.getElementById('remarksModal');
  modal.style.display = 'block';
}

function closeRemarksModal() {
  var modal = document.getElementById('remarksModal');
  modal.style.display = 'none';
}

function saveRemarks() {
  var remarks = document.getElementById('remarksInput').value;

  // Check if remarks is empty
  if (!remarks) {
    console.error('Remarks cannot be empty.');
    return;
  }

  // Send an AJAX request to save the remarks
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        console.log('Remarks saved successfully:', remarks);
        closeRemarksModal();
      } else {
        console.error('Error saving remarks:', xhr.status);
      }
    }
  };

  xhr.open('POST', 'save_remarks.php', true);  // Replace with the actual server-side script URL
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send('remarks=' + encodeURIComponent(remarks));
}


</script>

</body>
</html>
