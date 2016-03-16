<?php
class Cube {

  public $cube=array();

  function Cube ($dimension,$symbols=false) {

    $n=$dimension+2;

    for ($i=0; $i < $n+2; $i++) {
      for ($j=0; $j < $n+2; $j++) { 
        for ($k=0; $k < $n+2; $k++) { 

          $this->cube[$i][$j][$k]=0;

        }   
      }
    }

    $this->init();

  }
  
  public function print_cube () {

  }

  public function init () {
    
  }

}
?>