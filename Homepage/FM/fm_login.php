<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = trim($_POST['name']);
    $pass = $_POST['password'];

    if (!empty($name) && !empty($pass)) {
        $query = "SELECT * FROM fm_data WHERE name = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user_data = $result->fetch_assoc();

            $stored_password = $user_data['password'];
            if (
                $stored_password === $pass ||                    
                password_verify($pass, $stored_password)         
            ) {
                $_SESSION['fm_id'] = $user_data['id']; 
                header("Location: fm_dashboard.php");
                exit;
            } else {
                echo "<script>alert('Wrong password.');</script>";
            }
        } else {
            echo "<script>alert('User not found.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please enter both name and password.');</script>";
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

</head>
<body>
  <div class="login"> 
  <form action="" method="post">
    <h2>LOGIN</h2>
     
     <label for="">Name</label>
     <input type="text" name="name" placeholder="Enter name"> <br>
     
     <label for="">Password</label>
     <input type="password" name="password" placeholder="Enter password"> <br>     

     <input type="submit" value="Submit">
  </form>
  <p>Create account <a href="fm_signup.php">Sign up here</a></p>
