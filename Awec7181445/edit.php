<?php
// including the database connection file
include_once("includes/connection.php");
include("includes/header3.php");
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $Event=$_POST['Event'];
    $Type=$_POST['Type'];
    $Price=$_POST['Price'];    
    
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
    } else {    
        //updating the table
        $result = mysqli_query($connection, "UPDATE events SET Event='$Event',Type='$Type',Price='$Price' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: admin.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM events WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $Event = $res['Event'];
    $Type = $res['Type'];
    $Price = $res['Price'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    
    <form name="form1" method="post" action="edit.php" style="font-size: 16px;">
        <table border="0">
            <tr> 
                <td>Event</td>
                <td><input type="text" name="Event" value="<?php echo $Event;?>"></td>
            </tr>
            <tr> 
                <td>Type</td>
                <td><input type="text" name="Type" value="<?php echo $Type;?>"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="text" name="Price" value="<?php echo $Price;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update" style="color: #fff;background-color: #00598b;"></td>
            </tr>
        </table>
    </form>
</body>
</html>