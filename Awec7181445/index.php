<?php

include('includes/header.php');

include_once("includes/connection.php");

?>

<body>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/img1.jpg" style="padding:60px; height:600px; " alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/img2.jpg" style="padding:60px; height:600px;" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/img3.jpeg" style="padding:60px; height:600px;" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/img4.jpg" style="padding:60px; height:600px;" alt="Fourth slide">
    </div>
  </div>
</div>

<div class="container">
	<div class="row">        
        <div class="col-md-12">
        <h2>POPULAR EVENTS</h2> </br>
        <div class="table-responsive">
                
             <table id="mytable" class="table table-bordered table-striped">
                   
                   <thead style="font-size:22px;">                   
                   
                   <th>EVENT</th>
                    <th>TYPE</th>
                     <th>PRICE</th>                    
                    
                   </thead>
    <tbody>
    <?php
    function displayData($result){

    while($row = $result->fetch_assoc()){   
      echo "<tr>";
      echo "<td>".$row['Event']."</td>";
      echo "<td>".$row['Type']."</td>";
      echo "<td>".$row['Price']."</td>"."</tr>"; 
             
    }
}
    $result = $connection->query("SELECT * FROM events ");
    displayData($result);
    ?>
    </tbody>
        
</table>
            
        </div>
		</div>
	</div>
</div>
</br></br></br></br></br>

<?php
    include('includes/footer.php');
 ?>

</body>
</html>