<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>

  body {
    width: auto;
    overflow-x: hidden;
  }
  #pieChart {
    margin: 70px 80px 20px 0;
    justify-content: center;
    padding: 80px;
    display: block;
    width: 300px;
    /* border: 1px solid rgb(218, 215, 215, 0.5); */
    border-radius: 2px;
    box-shadow: 0  0 4px   rgb(218, 215, 215, 0.5);
    display: block; 
    box-sizing: border-box; 
    height: 300px; 
  }
  nav {
  background-color: #272727; 
  height: 100%; 
  width: 200px; 
  position: fixed; 
  /* top: 50;  */
  left: 0; 
  padding: 10px;
  padding-top: 150px;
}
ul.main {
  list-style-type: none; 
  padding: 0;
  margin: 0;
}

ul.main li {
  margin-bottom: 10px; 
}

ul.main li a {
  color: white; 
  text-decoration: none; 
  display: block; 
  padding: 10px; 
}

/* Style the search container */
.search-container {
  /* margin-top: 10px; */
  border: none;
  border-radius: 50px;
  
}
ul.main {
  list-style-type: none; /* Remove bullet points for list items */
  padding: 0;
  margin: 0;
}

ul.main li {
  margin-bottom: 10px; /* Add some spacing between items */
}

ul.main li a {
  color: white; /* Text color for the links */
  text-decoration: none; /* Remove underline from the links */
  display: block; /* Display links as blocks to fill the sidebar */
  padding: 10px; /* Add padding to the links */
}

ul.main li a:hover {
  background-color: #555; /* Background color on hover */
  border-radius: 5px; /* Add a little rounded corner on hover */
}

/* Adjust the layout for the canvas section */
#barChart {
  max-height: 400px;
  /* margin-top: 200px;  */
  margin: 100px 80px 20px 0 ;
    padding: 30px;
    display: block;
    width: 400px;
    /* border: 1px solid rgb(218, 215, 215, 0.5); */
    border-radius: 2px;
    box-shadow: 0 0 4px rgb(218, 215, 215, 0.5);
}


          h2 {
            margin-bottom: 20px;
        }

        table {
            width: auto;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            color: #3498db;
        }

        a:hover {
            background-color: #3498db;
            color: #fff;
        }

        label {
          color: #fff ; 
        }

        #userList { 
         max-width: 100%; 
         width: 50%; 
         margin: 10px 0; 
         padding: 20px;
         border: 1px solid rgba(218, 215, 215, 0.9); 
         border-radius: 10px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         background-color: #fff;
         top: 50%; 
         
        }


        .modal {
          display: none;
          position: fixed;
          z-index: 1;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          width: 400px;
          height: 600px;
          padding: 50px;
          overflow: auto;
          background-color: rgba(0, 0, 0, 0.9);
          align-items: center;
          justify-content: center;
        }

        .modal-content {
          display: flex;
          flex-direction: column;
          align-items: center;
          background-color: #fff;
          margin: 0 auto;
          padding: 20px;
          border: 1px solid #888;
          width: 100%;
          height: 100%;
        }

        .modal-content label {
          margin-bottom: 5px;
      }

      .modal-content input {
          width: 80%; 
          padding: 10px;
          margin-bottom: 10px;
          box-sizing: border-box;
      }

        input[type=submit] {
          background-color: #fff;
          color:gray;
          width:auto;
          padding:10px;
          font-weight:bold;
        }
        input[type=submit]:hover {
          background-color: rgb(136, 8, 8);
          color: #fff;
        }
 .header {
  display: flex;
  justify-content: space-between;
  top: 0;
  right: 0;
  width: 100%;
  z-index: 10;
  position: fixed;
  opacity: 10;
  padding: 10px;
  text-align: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  margin-left: 50px;
  background-color: white;
}

.search-container {
  display: inline-block; /* Align inline with header */
  margin-right: 20px; /* Add margin for spacing */
}

.search-container input[type=text] {
  padding: 10px;
  width: 200px;
}

.search-container button {
  padding: 10px 20px;
  background-color: black;
  color: white;
  border: none;
}
.search-container button:hover {
  background-color: gray;
}
.logout-container {
  padding: 10px 20px;
  background-color: black;
  color: white;
  border: none;
}


  #announcementForm {
    max-width: 100%;
    margin: auto;
    margin: 0 auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  #announcementForm label {
    display: block;
    margin-bottom: 5px;
    color: #333;
  }

  
  #announcements {
    top: 20px;
    padding: 20px;
  }

  #announcementForm textarea {
    width: calc(100% - 50px);
    height: 100px;
    resize: vertical;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-family: Arial, sans-serif;
  }
  #announcementForm input[type="submit"] {
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  #announcementForm input[type="submit"]:hover {
    background-color: #0056b3;
  }
  #announcement {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-top: 20px;
    margin-bottom: 20px;
    position: relative;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  #announcement strong {
    color: #333;
  }
  .announcement-actions button {
    padding: 10px 20px;
    margin-left: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  .announcement-actions button:hover {
    background-color: #eee;
  }
  .close {
      color: white;
      float: right;
      font-size: 30px;
      font-weight: bold;
      cursor:pointer;
    }

    .navigation {

    }

</style>

<body>
<div class="header" id="header">
  <h1>ADMIN PAGE NI DOO!</h1>
  <div class="search-container">
    <form action="/search" method="get">
      <input type="text" placeholder="Search..." name="query" style="max-width: 100%; border: none; border-radius: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1)">
      <button type="submit" style="border-radius: 20px;">Search</button>
      <button type="button" onclick="logoutAndRedirect()" style="background-color: transparent; color: black;">Logout</button>
    </form>
  </div>
</div>

        <div class="row">
          <div class="col-2">
            <nav role='navigation'>
              <ul class="main">
                <li class="dashboard"><a href="#barChart">Bar Graph of Activities</a></li>
                <li class="edit"><a href="#users">List of Members</a></li>
                <li class="write"><a href="#pieChart">Pie Chart of Gender</a></li>
                <li class="comments"><a href="#user_announcement">Announcement</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-6">
            <canvas id="barChart"></canvas>
            <h3>Bar Graph of Activities</h3>
          </div>
          <div class="col-4">
            <canvas id="pieChart"></canvas>
            <h3>Gender Pie Graph</h3>
          </div>
        </div>

        <div class="row" id="user_announcement">
          <div class="col-2"></div>
          <div class="col-8" id="announcement">
          <h1>Admin - Announcement Page</h1>
            <div id="announcementForm">
              <form onsubmit="submitAnnouncement(event)">
                <label for="announcementContent">Write Announcement:</label><br>
                <textarea id="announcementContent" name="announcementContent" required></textarea><br><br>
                <input type="submit" value="Post Announcement">
              </form>
            </div>
  
            <div id="announcements">
              <div id="announcementList"></div>
            </div>
            </div>
          </div>


          <div class="row">
            <div class="col-2"></div>
            <div class="col-8" id="userList" >
            <h2>User List</h2>

            <table border="1" id="users">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php
                $servername = "localhost"; // Replace with your actual database server name
                $username = "root"; // Replace with your actual database username
                $password = ""; // Replace with your actual database password
                $dbname = "registration_db"; // Replace with your actual database name
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Delete user
                if (isset($_GET['delete_id'])) {
                    $delete_id = $_GET['delete_id'];
                    $sql = "DELETE FROM users WHERE id = $delete_id";
                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }
                
                // SQL query to retrieve users
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["fullName"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["role"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td><a href='javascript:void(0);' onclick='editUser(" . json_encode($row) . ")'>Edit</a>
                                  <a href='?delete_id=" . $row["id"] . "'>Delete</a></td>";

                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $user_id = $_POST['user_id'];
                    $address = $_POST['address'];
                    $age = $_POST['age'];
                    $status = $_POST['status'];
                    $role = $_POST['role'];

                    $sql_update = "UPDATE users SET address=?, age=?, status=?, role=? WHERE id=?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->bind_param("ssssi", $address, $age, $status, $role, $user_id);
                
                    if ($stmt_update->execute()) {
                      $updateSuccess = true;
                    } else {
                      $updateSuccess = false;
                      echo "Error updating user information: " . $conn->error;
                    }
                }
                $conn->close();

                ?>
          </div>
        </div>
      </div>
        </div>
  </div>

  <div class="modal" id="modal">
  <span class="close" onclick="closeModal()">&times;</span>
      <h2 style="color: white;">Edit User</h2>

      <!-- Form for editing user information -->
      <form action="" method="POST">
          <label for="address">Address:</label>
          <input type="text" id="modalAddress" name="address" value="<?php echo $row['address']; ?>"><br><br>

          <label for="age">Age:</label>
          <input type="text" id="modalAge" name="age" value="<?php echo $row['age']; ?>"><br><br>

          <label for="status">Status:</label>
          <input type="text" id="modalStatus" name="status" value="<?php echo $row['status']; ?>"><br><br>

          <label for="role">Role:</label>
          <input type="text" id="modalRole" name="role" value="<?php echo $row['role']; ?>"><br><br>

          <input type="hidden" name="user_id" id="modalUserId" value="<?php echo $row['id']; ?>">
          <input type="submit" value="UPDATE">
      </form>

  </div>
<script>
  function closeModal() {
    var modal = document.getElementById('modal');
    modal.style.display = 'none';
  }

  function logoutAndRedirect() {
  // Perform any logout actions here (e.g., clearing sessions, cookies, etc.)
  // ...

  // Redirect to your landing page
  window.location.href = "index.html";
}
</script>



  


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#barChart'), {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
                    datasets: [{
                        label: 'Bar Chart',
                        data: [65, 59, 80, 81, 56, 55, 40,50,70,30,20,60],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)',
                            'rgba(255, 120, 64, 0.2)',
                            'rgba(210, 97, 207, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(201, 203, 207, 0.2)'

                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)',
                            'rgb(201, 203, 207)',
                            'rgb(255, 162, 235)',
                            'rgb(255, 159, 64)',
                            'rgb(153, 102, 255)',
                            'rgb(75, 192, 192)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });


        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#pieChart'), {
                type: 'pie',
                data: {
                    labels: ['Female', 'Male'],
                    datasets: [{
                        label: 'My first dataset',
                        data: [50, 100],
                        backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                        hoverOffset: 4
                    }]
                }
            });
        });


        function editUser(user) {
    // Populate modal fields with user information
    document.getElementById("modalAddress").value = user.address;
    document.getElementById("modalAge").value = user.age;
    document.getElementById("modalStatus").value = user.status;
    document.getElementById("modalRole").value = user.role;
    document.getElementById("modalUserId").value = user.id;

    // Show the modal
    document.getElementById("modal").style.display = "block";
  }

  window.onclick = function(event) {
    if (event.target == document.getElementById("modal")) {
      document.getElementById("modal").style.display = "none";
    }
  }


// success modal after the user info update
  document.addEventListener("DOMContentLoaded", () => {
    <?php if (isset($updateSuccess) && $updateSuccess): ?>
    // Redirect back to the original page after a successful update
    setTimeout(function() {
        window.location.href = window.location.href;  // Redirect to the current page
    }, 2000);  // Redirect after 2 seconds (you can adjust this time)
    <?php endif; ?>
    });

    function closeSuccessModal() {
        document.getElementById("successModal").style.display = "none";
    }

    </script>
  <script>
    // Retrieve announcements from localStorage
    const announcements = JSON.parse(localStorage.getItem('announcements')) || [];

    // Display announcements on the user page
    const announcementList = document.getElementById('announcementList');
    announcements.forEach((announcement, index) => {
      const announcementDiv = document.createElement('div');
      announcementDiv.className = 'announcement';
      announcementDiv.innerHTML = `<strong>${announcement.timestamp}</strong><br>${announcement.content}
        <div class="announcement-actions">
          <button onclick="editAnnouncement(${index})">Edit</button>
          <button onclick="confirmDelete(${index})">Delete</button>
        </div>`;
      announcementList.appendChild(announcementDiv);
    });

    function editAnnouncement(index) {
      const announcement = announcements[index];
      const updatedContent = prompt('Edit announcement:', announcement.content);

      if (updatedContent) {
        announcement.content = updatedContent;
        announcement.timestamp = new Date().toLocaleString();

        // Update the announcement in localStorage
        localStorage.setItem('announcements', JSON.stringify(announcements));

        // Refresh the page to reflect the changes
        window.location.reload();
      }
    }

    function confirmDelete(index) {
      const confirmDelete = confirm('Are you sure you want to delete this announcement?');

      if (confirmDelete) {
        deleteAnnouncement(index);
      }
    }

    function deleteAnnouncement(index) {
      announcements.splice(index, 1);

      // Update the announcements in localStorage
      localStorage.setItem('announcements', JSON.stringify(announcements));

      // Refresh the page to reflect the changes
      window.location.reload();
    }

    function submitAnnouncement(event) {
      event.preventDefault();
      const announcementContent = document.getElementById('announcementContent').value;

      // Create a new announcement object
      const newAnnouncement = {
        content: announcementContent,
        timestamp: new Date().toLocaleString()
      };

      // Retrieve existing announcements or initialize an empty array
      announcements.unshift(newAnnouncement);

      // Store the updated announcements array in localStorage
      localStorage.setItem('announcements', JSON.stringify(announcements));

      // Clear the textarea
      document.getElementById('announcementContent').value = '';

      // Redirect to the user page
      window.location.href = 'view_announcement.html';
    }
  </script>
  
      </body>
</html>
