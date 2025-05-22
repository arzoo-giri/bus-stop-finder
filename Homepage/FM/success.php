<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data</title>
  <link rel="stylesheet" href="../style.css">

  <style>
    .add, .delete
    {
        background-color: green;
        color: white;
        border: 0;
        outline: none;
        border-radius: 5px;
        width: 70px;
        font-weight: bold;
        cursor: pointer;
    }
    .add{
      position: absolute;
      top: 150px;
      right: 380px;
      width: 100px;
      padding: 5px;
    }

    .delete{
        background-color: red;  
    }
    table {
      border-collapse: collapse;
      width: 70%;
      text-align: center;
      margin-top: 42px;
      margin-left: 10px;
    }
    th{
      color: #fff;
      background: #6b6d6a;
      text-align: center;
      font-weight: bold;
    }
    
    th, td{
      padding: 8px;  
      border-bottom: 2px solid #a3a1a158;     
    }

  </style>
</head>
<body>
  

<?php
include '../db.php'; 

$query = "SELECT * FROM stops";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);  

if($total != 0)
  {
    ?>
    <table>
      <tr>        
        <th>Id</th>
        <th>Stop Name</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Estimated time</th>
        <th>Action</th>
      </tr>
      <a href='busstop.php?id=$result[id]'><input type='submit' value='+ Add Stops' class='add'></a> 

      <?php

  while ($result = mysqli_fetch_assoc($data)) {
    echo "<tr>
              <td>".$result['id']."</td>
              <td>".$result['name']."</td>              
              <td>".$result['latitude']."</td>
              <td>".$result['longitude']."</td>  
              <td>".$result['estimated_time']."</td>          

              <td>
              <a href='delete_stop.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a>
              </td>
            </tr>";
  }
  echo "</table>";
} else {
  echo "<script type='text/javascript'>
  alert('No bus stops found. Add bus stops');
  window.location.href = 'busstop.php';    
</script>";
}

$conn->close();
?>

<script>
  function checkdelete() 
  { 
    return confirm('Are you sure you want to delete this record?');
  }
</script>

</body>
</html>

