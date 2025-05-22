<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="../style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
<div class="sidebar">
<div class="logo"></div>
<div class="menu">
<li>
      <a href="driver_dashboard.php">
        <i class="fas fa-user"></i>
        <span> MyInfo</span>
      </a>
    </li>
    <li>
      <a href="fm_data.php">
        <i class="fa-solid fa-bus"></i>
        <span>View schedules</span>
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fas fa-cog"></i>
        <span>Settings</span>
      </a>
    </li>
    <li class="logout">
      <a href="#">
        <i class="fas fa-sign-out-alt"></i>
        <span onclick="redirectToPage()">logout</span>
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
    <table class="table">
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Place name</th>
            <th>Password </th>
            <?php include '../Driver/driver_display.php'; ?>
        </tr>
    </table>
  </div>
</section>
</section>
</div>

<script src="../home.js"></script>

</body>

</html>