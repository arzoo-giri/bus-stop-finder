
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <link rel="stylesheet" href="../style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
  <div class="sidebar">
  <div class="logo"></div>
  <div class="menu">
    
    
    <li>
      <a href="#" onclick="loadPHPContent('success1.php')">
      <i class="fa-solid fa-calendar-days"></i>
        <span>View schedules</span>
      </a>
    </li>
    <li>
    <a href="#" onclick="loadPHPContent('../newmap.php')">
      <i class="fa-duotone fa-bench-tree"></i>
        <span>Stops</span>
      </a>
    </li>
    <li class="logout">
      <a href="../home.php">
        <i class="fas fa-sign-out-alt"></i>
        <a href="../home.php">Logout</a>
      </a>
    </li>
  </div>
  </div>

  <div class="main--content">
    <div class="header--wrapper">
      <div class="header--title">
        <span>Driver</span>
        <h2>Dashboard</h2>
    </div>
  </div>
  
  <section class="data">
  <div class="data-list">
    <h1>Today's data</h1>    
    <div id="phpContent"></div>        
  </div>
</section>
</div>

<script>
    function loadPHPContent(url) {
      $.get(url, function(data) {
        $("#phpContent").html(data);
      });
    }
  </script>

<script src="home.js"></script>

</body>

</html>