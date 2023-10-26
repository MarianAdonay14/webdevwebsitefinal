<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "remarks_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT remarks FROM activities";  // Modify this query as needed

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["remarks"] . "</p>";
    }
} else {
    echo "No remarks found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Remarks View</title>
</head>
<body>

<div id="remarksDisplay">
  <h1>Remarks</h1>
  <!-- Ang mga remarks gikan sa database idisplay diri -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
<script>
function saveRemarks() {
  var remarks = document.getElementById('remarksInput').value;

  if (!remarks) {
    console.error('Remarks cannot be empty.');
    return;
  }

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        console.log('Remarks saved successfully:', remarks);
        closeRemarksModal();
        loadRemarks(); // Tawgon ang function alang sa pagkuha sa mga remarks
      } else {
        console.error('Error saving remarks:', xhr.status);
      }
    }
  };

  xhr.open('POST', 'save_remarks.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send('remarks=' + encodeURIComponent(remarks));
}

function loadRemarks() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        document.getElementById('remarksDisplay').innerHTML = xhr.responseText;
      } else {
        console.error('Error loading remarks:', xhr.status);
      }
    }
  };

  xhr.open('GET', 'get_remarks.php', true);  // Modify this URL as needed
  xhr.send();
}

document.addEventListener('DOMContentLoaded', function() {
  loadRemarks(); // Tawgon ang function alang sa pagkuha sa mga remarks sa start
});
</script>

</body>
</html>
