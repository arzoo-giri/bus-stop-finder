<?php
session_start();

include '../db.php';

if($_SERVER['REQUEST_METHOD']=="POST")
{
  $name = $_POST['name'];
  $pass = $_POST['password'];

    if(!empty($name) && !empty($pass))
    {
      $query = "INSERT into admin (name, password) VALUES ('$name', '$pass') limit 1";
      $result =  mysqli_query($conn, $query);
  
      mysqli_query($conn, $query);

      echo "<script type='text/javascript'>      
      window.location.href = 'admin_dashboard.php';
    </script>";    
    }
    else {
      echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
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
    .box{
      width: 360px;
      height: 300px;
      margin: auto;
      background: #1B9C85;
    }
    form label{
      margin-left: 8px;
      margin-bottom: 4px;
    }
    form input{
      margin-left: 20px;
      
    }
    input[type="submit"]{
      width: 320px;
      height: 35px;
      margin-top: 20px;
      background-color: black;
      color: white;
      font-size: 18px;
      cursor: pointer;
      display: inline-block;
    }

    input[type="submit"]:hover{
      color: white;
      background-color: #6B6D6A;
    }
  </style>
  
</head>
<body>
  <div class="box"> 
  <form action="" method="post">
    <h2>LOGIN</h2>
     
     <label for="">Name</label>
     <input type="text" name="name" placeholder="Enter name"> <br>
     
     <label for="">Password</label>
     <input type="text" name="password" placeholder="Enter password"> <br>     

     <input type="submit" value="Submit">
  </form>
</body>
</html>
