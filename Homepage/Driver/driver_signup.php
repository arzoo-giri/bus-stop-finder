<?php
session_start();

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $number = $_POST['number'];
  $regno = $_POST['bus_registration'];
  $license = $_POST['license'];
  $pass = $_POST['password'];

  if (empty($name) && empty($number) && empty($regno) && empty($license) && empty($pass)) 
  {
    echo "<script> alert('Please enter valid information.')</script>";
  } 
  else 
  {
    $query = "INSERT INTO driver_data (name, number, bus_registration, license, password) VALUES ('$name', '$number', '$regno', '$license', '$pass')";
      
    mysqli_query($conn, $query);

    echo "<script type='text/javascript'>
      alert('Successfully registered. Click OK to continue.');
      window.location.href = 'driver_dashboard.php';
    </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web app</title>
  <link rel="stylesheet" href="../front.css">
  <style>
    span {
      color: red;
    }
    .signup{
      height: 637px;
    }
  </style>
</head>

<body>
  <div class="signup">
    <form action="" method="post" onsubmit="return validation()">
      <h2>SIGN UP</h2>

      <label for="user">Full name</label>
      <input type="text" id="user" name="name" placeholder="Full Name"> <br>
      <span id="userr"></span>

      <label for="num">Phone number</label>
      <input type="text" id="num" name="number" placeholder="Number"> <br>
      <span id="numm"></span>

      <label for="reg">Vehicle registration number</label>
      <input type="text" id="reg" name="bus_registration" placeholder="Vehicle registration number"> <br>
      <span id="regno"></span>

      <label for="lic">License number</label>
      <input type="text" id="lic" name="license" placeholder="License number"> <br>
      <span id="licen"></span>

      <label for="pass">Password</label>
      <input type="password" id="pass" name="password" placeholder="Password"> <br>
      <span id="passs"></span>

      <label for="con">Confirm password</label>
      <input type="password" id="con" name="confirm_password" placeholder="Re-type Password"> <br>
      <span id="conn"></span>

      <input type="submit" value="Submit">

      <p>Already have an account? <a href="driver_login.php" class="ca">Login</a></p>
    </form>
  </div>

  <script src="home1.js"></script>
</body>

</html>