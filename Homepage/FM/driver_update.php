<?php
  include '../db.php';

  $id = $_GET['id'];

  $query = "SELECT * FROM driver_data WHERE id = '$id'";
  $data = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web app</title>
  <link rel="stylesheet" href="../front.css">
  <style>
    span{
      color: red;
      font-size: 20px;
    }
  </style>

</head>
<body>
 
  <div class="login"> 
  <form action="" method="post">
    <h2>Update Details</h2>
     
     <label for="">Name</label>
     <input type="text" value="<?php echo $result['name']; ?>" id="user" name="name" placeholder="Enter name"> <br>
     <span id="userr"></span>

     <label for="">Number</label>
     <input type="text" value="<?php echo $result['number']; ?>" id="num" name="number" placeholder="Enter number (Do not write +977)"> <br>
     <span id="numm"></span>     

     <input type="submit" value="Update Details" name="update" onclick="validation()">

     </form>
     </div>

     <script src="../home.js"></script>
   
</body>
</html>

<?php

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update']))
{
  $name = $_POST['name'];
  $number = $_POST['number'];
  

      $query = "UPDATE driver_data SET name='$name',number='$number' WHERE id = '$id'";

      $data = mysqli_query($conn, $query);

      if($data) {
         echo "<script type='text/javascript'>
         alert('Record updated');
         window.location.href = 'fm_dashboard.php';
       </script>";
      }
      else {
       echo 'please fill out all!'; 
     }
    }
?>


