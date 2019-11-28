<?php
//including the database connection file
include_once("includes/connection.php");
 
$result = mysqli_query($connection, "SELECT * FROM events ORDER BY id DESC");
include('includes/header3.php');
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <h1>ADMIN PANEL</h1></br>
    <div style="font-size: 16px;">
    <a href="add.php">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Event</td>
            <td>Type</td>
            <td>Price</td>  
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['Event']."</td>";
            echo "<td>".$res['Type']."</td>";
            echo "<td>".$res['Price']."</td>";    
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
</div>
</body>
</html>