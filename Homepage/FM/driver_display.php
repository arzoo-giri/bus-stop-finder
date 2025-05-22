<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data</title>
  <link rel="stylesheet" href="../style.css">

  <style>
    .update, .delete
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

    .delete{
        background-color: red;  
    }
    table {
      border-collapse: collapse;
      width: 70%;
      text-align: center;
      margin-top: 25px;
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

  $query = "SELECT * FROM driver_data";
  $data = mysqli_query($conn, $query);

  $total = mysqli_num_rows($data);  

  if($total != 0)
  {
    ?>
    <table>
      <tr>        
        <th>Id</th>
        <th>Name</th>
        <th>Number</th>
        <th>Vehicle registration No</th>
        <th>License No </th>
        <th>Action</th>
      </tr>

    <?php
    while($result = mysqli_fetch_assoc($data))
    {
      echo "<tr>
              <td>".$result['id']."</td>
              <td>".$result['name']."</td>
              <td>".$result['number']."</td>
              <td>".$result['bus_registration']."</td>
              <td>".$result['license']."</td>
              <td>
                <a href='driver_update.php?id=$result[id]'><input type='submit' value='Update' class='update'></a> 
                <a href='driver_delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a>
              </td>    
            </tr>";
    }
    echo "</table>";
  }
  else 
  {
    echo "No records found";
  }
?>

<script>
  function checkdelete() 
  { 
    return confirm('Are you sure you want to delete this record?');
  }
</script>

</body>
</html>
