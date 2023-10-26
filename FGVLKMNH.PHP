<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<canvas id="activityBarChart"></canvas>

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
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    
    const activities = [
  { activityName: "Activity 1", activityDate: "2023-12-05" },
  { activityName: "Activity 2", activityDate: "2023-12-15" },
  { activityName: "Activity 3", activityDate: "2023-11-10" },
  // Add more activities
];

const activitiesByMonth = {};

activities.forEach((activity) => {
  const date = new Date(activity.activityDate);
  const month = date.getMonth(); // Get the month (0-11)
  const monthName = new Intl.DateTimeFormat("en-US", { month: "short" }).format(date);
  activitiesByMonth[monthName] = (activitiesByMonth[monthName] || 0) + 1;
});
const ctx = document.getElementById("activityBarChart").getContext("2d");

const barChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: Object.keys(activitiesByMonth),
    datasets: [
      {
        label: "Activities",
        data: Object.values(activitiesByMonth),
        backgroundColor: "rgba(75, 192, 192, 0.2)",
        borderColor: "rgba(75, 192, 192, 1)",
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        stepSize: 1,
      },
    },
  },
});

    </script>