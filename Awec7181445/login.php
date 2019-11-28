<?php 
session_start();
include_once('includes/header.php');


include("includes/connection.php"); 
// $tbl_name="user_levels"; 
if (isset($_POST['Login'])){
$username=$_POST['UserName']; 
$password=$_POST['Password']; 

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);

$result = mysqli_query($connection, "SELECT * FROM user WHERE UserName='$username' AND Password='$password'");

if(mysqli_num_rows($result) != 1){
      echo "<script>alert(' Wrong Username or Password Access Denied !!! Try Again');
      window.location='login.php';
      </script>";
     }else{
      $row = mysqli_fetch_assoc($result); 
      if($row['userlevel'] == 1){
       header('location: admin.php');
      }
      else if($row['userlevel'] == 0 ){
           header("Location: user.php");
      }
      else{
       echo "<script>alert('Wrong Username or Password Access Denied !!! Try Again');
      window.location='index.php';
      </script>";
      }
     }

}
?>


		  <div class="main">
  <div class="container">
    
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-10">
      <!-- BEGIN CONTENT -->
      <div class="col-md-6 col-sm-6">
        
      <h2>LOGIN TO NEP EVENTS</h2>
      
             
        <div class="panel-body" style="width:500px; background-color:#ebf6ff ; padding: 20px; border-style: double; border-color: #443e39 ">
   
    <form action="" method="POST">
      <h1>Login</h1>

      
      <div>
        <input type="text" placeholder="Username" required="" id="UserName" name="UserName" style="font-size: 16px;" />
        </div>
        <div>
         <input type="password" placeholder="Password" required="" id="Password" name="Password" style="font-size: 16px;" />
      </div>
     </br>
      <div>
        <input type="submit" value="Log In" name="Login" style="font-size:18px; background-color: #00598b; color:#fff;" />
      </div>
      <div>
        
        <a href="#">&nbsp; | &nbsp; Forget password?</a></span>
      </div>
    </form><!-- form -->
    </div>
    </div>
    </dive><!-- container -->
