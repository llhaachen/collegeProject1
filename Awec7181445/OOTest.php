<?php 
include('includes/header.php');
require_once('object1.php'); 

  $oop = new object1("OOP"); 

  $oop->setEvent("Fireworks Festival"); 
  $oop->setName("Tihar"); 
  
  print $oop->getName();

  print "<br/>";

  print " Event = ".$oop->getEvent();

//invoke the destructors 

  exit(); 

  $name->destruct(); 
  

?>