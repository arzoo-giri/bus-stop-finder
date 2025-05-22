<?php
include '../db.php';

if(isset($_GET['bus_registration'])) {
  $busRegistration = $_GET['bus_registration']; 

  $query = "SELECT * FROM driver_data WHERE bus_registration = ?";
   
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $busRegistration);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if(mysqli_num_rows($result) != 0) {
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
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
              <td>".$row['id']."</td>
              <td>".$row['name']."</td>
              <td>".$row['number']."</td>
              <td>".$row['bus_registration']."</td>
              <td>".$row['license']."</td>
              <td>                
                <a href='driver_display.php?bus_registration=".$row['bus_registration']."'></a> 

                
              </td>    
            </tr>";
    }
    echo "</table>";
  } else {
    echo "No records found";
  }

  mysqli_stmt_close($stmt); 
  mysqli_close($conn);
}
?>
