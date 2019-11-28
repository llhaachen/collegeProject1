<?php 
// class definition 

  class object1 { 

  // define properties /attributes 

  private $name; 
  private $band;

  //Setters 
   public function setName($name) { 
  $this->name = $name; 
  } 

  public function setEvent($event) { 
  $this->event = $event; 
  } 

  //Getters 

  public function getName() { 
  return $this->name; 
  } 

  public function getEvent() { 
  return $this->event; 
  } 

}
?>