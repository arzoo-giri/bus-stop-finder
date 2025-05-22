<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $place_name = trim($_POST['place_name']);
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    if (empty($name) || empty($email) || empty($place_name) || empty($pass) || empty($confirm_pass)) {
        echo "<script>alert('Please enter valid information.');</script>";
    } elseif ($pass !== $confirm_pass) {
        echo "<script>alert('Passwords do not match.');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } else {
        $check_sql = "SELECT * FROM fm_data WHERE email = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Email already registered. Please login.');</script>";
        } else {
            
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

            $insert_sql = "INSERT INTO fm_data (name, email, place_name, password) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("ssss", $name, $email, $place_name, $hashed_pass);

            if ($stmt->execute()) {
                echo "<script>
                    alert('Successfully registered.');
                    window.location.href = 'fm_dashboard.php';
                </script>";
                exit;
            } else {
                echo "<script>alert('Registration failed. Please try again.');</script>";
            }
        }
        $stmt->close();
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
    .signup{
      display: flex;
      height: 580px;
    }
    span {
      color: red;
    }
  </style>

</head>
<body>
  
  <div class="signup"> 
  <form action="" method="POST" onsubmit="return valid()">
    <h2>SIGN UP</h2>
     
     <label for="user">Name</label>
     <input type="text" id="user"name="name" placeholder="Enter name"> <br>
     <span id="user1"></span>

     <label for="email">Email</label>
     <input type="text" id="email" name="email" placeholder="Enter email"> <br>
     <span id="email1"></span>

     <label for="place">Place Name</label>
     <input type="text" id="place" name="place_name" placeholder="Enter place name"> <br>
     <span id="location"></span>

     <label for="pass">Password</label>
     <input type="password" id="pass" name="password" 
     placeholder="Enter password"> <br>
     <span id="pass1"></span>

     <label for="con">Confirm password</label>
     <input type="password" id="con" name="confirm_password" placeholder="Re-type Password"> <br>
     <span id="con1"></span>

     <input type="submit" value="Submit">

     <p>Already have an account?<a href="fm_login.php" class="ca">Login</a></p>
     
     
     </form>
     </div>
     
     <script src="FM.js"></script>
</body>
</html>