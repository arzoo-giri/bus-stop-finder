<?php
session_start();

include '../db.php';

if($_SERVER['REQUEST_METHOD']=="POST")
{
  $name = $_POST['name'];
  $pass = $_POST['password'];

  if(!empty($name) && !empty($pass))
  {
    $query = "SELECT * FROM driver_data WHERE name ='$name' limit 1";
    $result =  mysqli_query($conn, $query);

    if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data =  mysqli_fetch_assoc($result);

          if($user_data['password'] == $pass)
          {
            header("location:driver_dashboard.php");
            die;
          }
        }
      }
    echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
  }
  else{
    echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
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
  <p>Create account <a href="driver_signup.php">Sign up here</a></p>
