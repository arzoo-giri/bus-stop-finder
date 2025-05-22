<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Schedule</title>
  <link rel="stylesheet" href="../front.css">
  <style>
  .signup{
      height: 500px;
    }
    span {
      color: red;
    }
  </style>
</head>
<body>
  <div class="signup">
   
    <form action="" method="post">
    <h2>Add Schedule</h2>
      <label for="bus_registration">Bus Registration</label>
      <input type="text" id="bus_registration" name="bus_registration" placeholder="Enter bus registration" required>

      <label for="from">From(Busstop)</label>
      <input type="text" id="from_stop" name="from_stop" placeholder="Enter source bus stop" required>

      <label for="to">To (Busstop)</label>
      <input type="text" id="to_stop" name="to_stop" placeholder="Enter destination bus stop"required>

      <label for="departure">Departure</label>
      <input type="text" id="departure" name="departure" placeholder="Enter departure time"required>

      <label for="arrival">Arrival</label>
      <input type="text" id="arrival" name="arrival" placeholder="Enter arrival time"required>

      <input type="submit" value="Add Schedule">
    </form>
  </div>
</body>
</html>

<?php
include '../db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $busRegistration = $_POST['bus_registration'];
  $from = $_POST['from_stop'];
  $to = $_POST['to_stop'];
  $departure = $_POST['departure'];
  $arrival = $_POST['arrival'];

  $stmt = $conn->prepare("INSERT INTO schedules (bus_registration, from_stop, to_stop, departure, arrival) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $busRegistration, $from, $to, $departure, $arrival);
  $stmt->execute();

  header("Location: fm_dashboard.php");
  exit();
}
?>
