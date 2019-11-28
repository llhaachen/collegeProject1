<?php
//including the database connection file
include_once("includes/connection.php");
include('includes/header3.php');
 
if(isset($_POST['Submit'])) {    
    $Event = $_POST['Event'];
    $Type = $_POST['Type'];
    $Price = $_POST['Price'];
        
    // checking empty fields
    if(empty($Event) || empty($Type) || empty($Price)) {                
        if(empty($Event)) {
            echo "<font color='red'>Event field is empty.</font><br/>";
        }
        
        if(empty($Type)) {
            echo "<font color='red'>Type field is empty.</font><br/>";
        }
        
        if(empty($Price)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($connection, "INSERT INTO events(Event,Type,Price) VALUES('$Event','$Type','$Price')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='admin.php'>View Result</a>";
    }
}
?>

<html>
<head>
    <title>Add Song</title>
</head>
 
<body>
 
    <form action="add.php" method="post" name="form1" style="font-size: 16px;">
        <table width="25%" border="0">
            <tr> 
                <td>Event</td>
                <td><input type="text" name="Event"></td>
            </tr>
            <tr> 
                <td>Type</td>
                <td><input type="text" name="Type"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="text" name="Price"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add" style="color: #fff;background-color: #00598b;"></td>
            </tr>
        </table>
    </form>
</body>
</html>