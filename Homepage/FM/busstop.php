<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Bus Stop</title>
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
  <form action="" method="POST">
  <h2>Add Bus Stop</h2>
    <label for="stop_name">Stop Name</label>
    <input type="text" name="name" id="name" placeholder="Enter stop name" required><br><br>

    <label for="latitude">Latitude</label>
    <input type="text" name="latitude" id="latitude" placeholder="Enter latitude"required><br><br>

    <label for="longitude">Longitude</label>
    <input type="text" name="longitude" id="longitude" placeholder="Enter latitude" required><br><br>

    <label for="time_to_reach">Time to reach</label>
    <input type="text" name="estimated_time" id="time_to_reach" placeholder="Enter estimated time" required><br><br>
    
    <input type="submit" value="Add Bus Stop">
  </form>
  </div>
</body>
</html>


<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stopName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $latitude = filter_var($_POST['latitude'], FILTER_SANITIZE_STRING);
  $longitude = filter_var($_POST['longitude'], FILTER_SANITIZE_STRING);
  $reach = filter_var($_POST['estimated_time'], FILTER_SANITIZE_STRING);


 if (!empty($stopName) && is_numeric($latitude) && is_numeric($longitude) &&
    $latitude >= -90 && $latitude <= 90 &&
    $longitude >= -180 && $longitude <= 180 &&
    !empty($reach)) {

    $stmt = $conn->prepare("INSERT INTO stops (name, latitude, longitude, estimated_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $stopName, $latitude, $longitude, $reach);  
    $stmt->execute();

    echo "<script>alert('Successfully added');</script>";
    header("Location: fm_dashboard.php");
    exit();
} else {
    echo "<script>alert('Invalid input. Latitude must be between -90 and 90, Longitude between -180 and 180.');</script>";
}

}
?>



