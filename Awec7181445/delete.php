<?php
include("includes/connection.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($connection, "DELETE FROM events WHERE id=$id");
 
//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>