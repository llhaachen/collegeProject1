<?php 
// class definition 

  class ObjectO { 

  // define properties /attributes 

  private $name; 

  private $band;

  //Constructor called when instantiating bear. This demonstrates a default weight parameter

  // public function __construct($sname){ 

  // //pass the parameter to this name attribute 

  // $this->name = $sname; 

  // // $this->band = $band; 

  // } 

  //Destructor called when object leaves scope or script terminates 

  // public function __destruct(){ 

  // print "<br />Destroying ".$this->name; //just for information 

  // } 

  //Setters 
   public function setName($name) { 

  $this->name = $name; 

  } 

  public function setBand($band) { 

  $this->band = $band; 

  } 

  //Getters 

  public function getName() { 

  return $this->name; 

  } 

  public function getBand() { 

  return $this->band; 

  } 

}
?>