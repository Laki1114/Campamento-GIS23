<?php
include 'config.php';

$sql = "DELETE FROM driver WHERE id=2";

if (mysqli_query($con, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

?>