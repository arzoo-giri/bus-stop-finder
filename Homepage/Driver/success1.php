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
      position:absolute;
      top: 150px;
      right: 380px;
      width: 140px;
      padding: 7px;
    }

    .delete{
        background-color: red;  
    }
    table {
      border-collapse: collapse;
      width: 70%;
      text-align: center;
      margin-top: 44px;
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

$query = "SELECT * FROM schedules";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);  

if($total != 0)
  {
    ?>
    <table>
      <tr>        
        <th>Id</th>
        <th>Bus_registration</th>
        <th>From</th>
        <th>To</th>
        <th>Departure</th>
        <th>Arrival</th>
      </tr>

      <?php

  while ($result = mysqli_fetch_assoc($data)) {
    echo "<tr>
              <td>".$result['id']."</td>
              <td>".$result['bus_registration']."</td>              
              <td>".$result['from_stop']."</td>
              <td>".$result['to_stop']."</td>
              <td>".$result['departure']."</td>
              <td>".$result['arrival']."</td>            
            </tr>";
  }
  echo "</table>";
} else {
  echo 'No schedules to show.'; 
}

$conn->close();
?>


</body>
</html>
