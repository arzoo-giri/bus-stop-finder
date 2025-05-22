<?php
include 'db.php'; 

$query = "SELECT * FROM stops";
$result = mysqli_query($conn, $query);

$busStopData = [];

while ($row = mysqli_fetch_assoc($result)) {
  $busStopData[] = [
    'name' => $row['name'],
    'latitude' => $row['latitude'],
    'longitude' => $row['longitude'],
    'estimated_time' => $row['estimated_time'] 
  ];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nearby Bus Stops</title>
  <link rel="stylesheet" type="text/css" href="map.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />

  
</head>
<body>
  <div id="map"></div>

  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
  <script>
  
    var map = L.map('map').setView([27.7172, 85.3240], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18
    }).addTo(map);

    var busStopData = <?php echo json_encode($busStopData); ?>;

    function calculateDistance(lat1, lon1, lat2, lon2) {
      var R = 6371e3; 
      var φ1 = (lat1 * Math.PI) / 180;
      var φ2 = (lat2 * Math.PI) / 180;
      var Δφ = ((lat2 - lat1) * Math.PI) / 180;
      var Δλ = ((lon2 - lon1) * Math.PI) / 180;

      var a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
        Math.cos(φ1) * Math.cos(φ2) * Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

      return R * c;
    }

    function displayNearbyBusStops(userLat, userLng) {
      for (var i = 0; i < busStopData.length; i++) {
        var busStop = busStopData[i];
        var distance = calculateDistance(userLat, userLng, busStop.latitude, busStop.longitude);

        if (distance <= 1000) {
          var marker = L.marker([busStop.latitude, busStop.longitude]).addTo(map);
          marker.bindTooltip(busStop.name + ' (' + distance.toFixed(2) + ' meters) - Estimated Time: ' + busStop.estimated_time).openTooltip();
        }
      }  
    }

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var userLat = position.coords.latitude;
        var userLng = position.coords.longitude;

        var userMarker = L.marker([userLat, userLng], { icon: L.icon({ iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-red.png' }) }).addTo(map);
        userMarker.bindTooltip('Your location').openTooltip();

        displayNearbyBusStops(userLat, userLng);
      }, function (error) {
        alert('Error occurred while retrieving your location: ' + error.message);
      });
    } else {
      alert('Geolocation is not supported by your browser.');
    }
  </script>
  <div id="back">
      <a href="home.php"><h3>Go To Home Page</h3></a>
  </div>
  
</body>
</html>
