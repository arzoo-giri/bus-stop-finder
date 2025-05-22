<?php
include '../db.php';

$id = $_GET['id'];

$query = "DELETE FROM stops WHERE id = '$id'";

$data = mysqli_query($conn, $query);

if ($data) {
  echo "<script type='text/javascript'>
    alert('Record deleted');
    window.location.href = 'fm_dashboard.php';    
  </script>";
} else {
  echo "<script type='text/javascript'>
    alert('Failed to delete');
  </script>";
}
?>
