<?php include 'connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            font-family: courier;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        input{
            margin: 10px 0 10px 0;
            padding: 5px;
            font-family: courier;
            font-weight: bold;
            font-size: 20px;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
            background-color: #fff;
            width: 80%;
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <form action="form.html">
        <input method="POST" type="button" value="ADD USERS" id="btn" onClick="add()">
    </form>
    <table>
        <?php
        $query = "SELECT * FROM users";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Age</th>";
                echo "<th>Address</th>";
                echo "<th>Action</th>";
                echo "</tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                    echo "<td>
                    <button class='edit-btn' onclick='editUser(\"" . $row['ID'] . "\")'>Edit</button>

                            <button><a href='delete.php?userId=" . $row['ID'] . "' class='delete-btn' style='text-decoration: none; color: inherit;'>Delete</a></button>
                          </td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No user found.";
            }

            mysqli_free_result($result);
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
        ?>

        <?php
        
        ?>
    </table>
    <div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Edit User Information</h2>
        <!-- Add form fields for editing user information -->
        <form action="update.php" method="POST">
            <label for="editFirstName">First Name:</label>
            <input type="text" id="editFirstName" name="editFirstName" required><br>

            <label for="editLastName">Last Name:</label>
            <input type="text" id="editLastName" name="editLastName" required><br>

            <label for="editAge">Age:</label>
            <input type="number" id="editAge" name="editAge" required><br>

            <label for="editAddress">Address:</label>
            <input type="text" id="editAddress" name="editAddress" required><br>

            <!-- Add a hidden input field to store the user ID -->
            <input type="hidden" id="editUserId" name="editUserId">

            <input type="submit" value="Save">
        </form>
    </div>
</div>

    <script>
        function add() {
            window.location.href = "form.html";
        }

        function editUser() {
            window.location.href = "update.php";
        }

        function deleteUser(id) {
            window.location.href = "delete.php";
        }

        function editUser(id, firstName, lastName, age, address) {
            // Populate the modal with user data
            document.getElementById("editUserId").value = id;
            document.getElementById("editFirstName").value = firstName;
            document.getElementById("editLastName").value = lastName;
            document.getElementById("editAge").value = age;
            document.getElementById("editAddress").value = address;

            // Display the modal
            document.getElementById("editModal").style.display = "block";
        }

        // Function to close the edit modal
        function closeModal() {
            // Hide the modal
            document.getElementById("editModal").style.display = "none";
        }
    </script>
</body>

</html>