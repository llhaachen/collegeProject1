<?php include_once('includes/header.php');
include('includes/connection.php');
function isNameUnique($UserName){
    $querry="select * from user where UserName='$UserName'";
    global $connection;

    $result = $connection->query($querry);

    if($result->num_rows >=1){
      return false;
    }
    else{
      return true;
    }
  }
  function isEmailUnique($Email){
    $querry="select * from user where Email='$Email'";
    global $connection;

    $result = $connection->query($querry);

    if($result->num_rows >=1){
      return false;
    }
    else{
      return true;
    }
  }

  if (isset($_POST['Register']))//Execute if statement only after clicking the submit button 
  {
    //storing the value entered in the form usin the POST method
    $_SESSION['FirstName']=$_POST['FirstName'];
    $_SESSION['LastName']=$_POST['LastName'];
    $_SESSION['UserName']=$_POST['UserName'];
    $_SESSION['Email']=$_POST['Email'];
    $_SESSION['Password']=$_POST['Password'];
    $_SESSION['ConfirmPassword']=$_POST['ConfirmPassword'];
    //shuffling the given string

     if(strlen($_POST['UserName'])<6){
       header("Location:register.php?err=" . urlencode("Username must be at least 6 character"));
       exit();
    }
    else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $_POST['Password'])){
      header("Location:register.php?err=" . urlencode("Password must be at least 8"));
      exit();
    }
    else if(($_POST['Password'])!=($_POST['ConfirmPassword'])){
      header("Location:register.php?err=" . urlencode("Both Password dont match"));
      exit();
    }
    else if(!isEmailUnique($_POST['Email'])){
      header("Location:register.php?err=" . urlencode("Email already in use"));
      exit();
    }
    else if(!isNameUnique($_POST['UserName'])){
      header("Location:register.php?err=" . urlencode("Username already in use"));
      exit();
    }
    else{
      $FirstName=$_POST['FirstName'];
      $LastName=$_POST['LastName'];     
      $UserName=$_POST['UserName'];
      $Email=$_POST['Email'];
      $Password=($_POST['Password']);
      $ConfirmPassword=$_POST['ConfirmPassword'];
      //shuffling the given string
      $Code=str_shuffle("qwertyuiopASDFGHJKLzxcvBNM1234567890");
      $start=0;
      $length=10;
      $Code=substr($Code,$start,$length);//function to select a string from a position till the length
      $sql="INSERT INTO user (FirstName,LastName,UserName,Email,Password) VALUES ('$FirstName','$LastName','$UserName','$Email','$Password')";
      $qry = mysqli_query($connection, $sql);   
      echo "Record Inserted !";
      
    $to      = $Email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject 
    $message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$FirstName.'
Password: '.$Password.'
------------------------
 

 
'; // Our message above including the link
                     
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
      echo "Registration Complete! Please verify you email ";
      
    }
  }

?>

 <div class="main">
  <div class="container">
    
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN CONTENT -->
      <div class="col-md-12 col-sm-12">
        
      <h2>SIGN UP FOR MORE!</h2>
      
              <?php if(isset($_GET['err'])) { ?>
              <div class="alert alert-danger"><?php echo $_GET['err']; ?></div>
            <?php } ?>
        <div class="panel-body" style="width:750px; background-color:#ebf6ff ; padding: 20px; border-style: double; border-color: #443e39; font-size: 20px ">
          <form role="form" method="POST" action="Register.php" >
           
<div class="row" >
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                  <input type="text" name="FirstName" color="black" id="first_name" class="form-control input-sm" placeholder="First Name">
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                  <input type="text" name="LastName" id="last_name" class="form-control input-sm" placeholder="Last Name">
                </div>
              </div>
            </div>

            <div class="form-group">
              <input  style="width :50%" type="text"  color="black" name="UserName" id="User_Name" class="form-control input-sm" placeholder="UserName">
            </div>


            <div class="form-group">
              <input   style="width :50%" type="email" name="Email" id="email" class="form-control input-sm" placeholder="Email Address">
            </div>

            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                  <input type="password" name="Password" id="password" class="form-control input-sm" placeholder="Password">
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                  <input type="password" name="ConfirmPassword" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                </div>
              </div>
            </div>
             <div class="padding-top-20">                  
                         <input type="submit" name="Register" value="Register" class="btn btn-primary" style="font-size:18px;background-color: #00598b">

                       </div>
                       </form>
<?php
  $name = $password = $email = $phone = $gender = $birthday = $date = $bio = '';
  if(isset($_GET['submit'])){
    $name = $_GET['name'];
    echo $name;
    $pass= $_GET['password'];
    echo $pass;
    $mail = $_GET['email'];
    echo $mail;
    $ph = $_GET['phone'];
    echo $ph;
    $gen = $_GET['gender'];
    echo $name;
    $bd = $_GET['birthday'];
    echo $bd;
    $date = $_GET['date'];
    echo $date;
    $bio = $_GET['bio'];
    echo $bio;


  }

?>