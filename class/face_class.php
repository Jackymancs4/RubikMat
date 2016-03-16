<?php
class Face {
    
  public $cube=array();

  function Face ($dimension,$symbols=0) {

  } 
  
  public function initFront ($symbol) {
    for ($i=1; $i < $n+1; $i++) { 
     for ($j=1; $j < $n+1; $j++) { 
        $cube[0][$i][$j]=$symbol;
      }
    }
  }

  public function initTop ($symbol) {
    for ($i=1; $i < $n+1; $i++) { 
     for ($j=1; $j < $n+1; $j++) { 
        $cube[$i][0][$j]=$symbol;
      }
    }
  }
  
  public function initFront ($symbol) {
    for ($i=1; $i < $n+1; $i++) { 
     for ($j=1; $j < $n+1; $j++) { 
        $cube[$i][$n+1][$j]=$symbol;
      }
    }
  }
  
  public function initFront ($symbol) {
    for ($i=1; $i < $n+1; $i++) { 
     for ($j=1; $j < $n+1; $j++) { 
        $cube[$n+1][$i][$j]=$symbol;
      }
    }
  }
  
  public function initFront ($symbol) {
    for ($i=1; $i < $n+1; $i++) { 
     for ($j=1; $j < $n+1; $j++) { 
        $cube[0][$i][$j]=$symbol;
      }
    }
  }
  
  public function initFront ($symbol) {
    for ($i=1; $i < $n+1; $i++) { 
     for ($j=1; $j < $n+1; $j++) { 
        $cube[0][$i][$j]=$symbol;
      }
    }
  }

}

?>