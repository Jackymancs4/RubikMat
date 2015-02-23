<?php
class Face {
  
  private $dimension;
  public $face=array();
  
  function Face ($dimension,$symbol=0) {
    $this->dimension=$dimension;
  
    for($i=0;$i<$dimension;$i++){
      for($j=0;$j<$dimension;$j++){
        $this->face[$i][$j]=$symbol;
      }
    }
  
  } 
  
  public function print_face () {
  
    echo "<table>";
    for($i=0;$i<$this->dimension;$i++){
      echo "<tr>";
      for($j=0;$j<$this->dimension;$j++){
        echo "<td>".$this->face[$i][$j]."</td>";
      }
      echo "</tr>";
    }
    echo "</table>";    
  }
  
  public function get_n ($num,$type="r") {
    $ret=array();
    
    switch($type) {
      case "r":
        for($i=0;$i<$this->dimension;$i++){
          $ret[]=$this->face[$num][$i];
        }
      break;
      case "c"
        for($i=0;$i<$this->dimension;$i++){
          $ret[]=$this->face[$i][$num];
        }
      break;
    }
    
    return $ret;
  }
  
  public function set_n () {
  
  }
  
  public function rotate_face ($dir=0, $mat=false) {
    $ret=array();
    
    if($mat==false) {
      $mat=$this->face;
    }
    
    switch ($side) {
      case 0:
        for($i=0;$i<count($mat);$i++){
            for($j=0;$j<count($mat[$i]);$j++){
              $ret[$i][$j]=$mat[count($ret[$i])-1-$j][$i];
            }
        }

      break;
      case 1:
        for($i=0;$i<count($mat);$i++){
            for($j=0;$j<count($mat[$i]);$j++){
              $ret[$i][$j]=$mat[$j][count($ret[$i])-1-$i];
            }
        }
      break;
      
    }
    
    return $ret; 
  }
  
  public function get_side ($side=0) {
    $mat=array();
    
    switch ($side) {
      case 0:
        $mat=$this->face;
      break;
      case 1:
        $mat=$this->rotate_face();
      break;
      case 2:
        $mat=$this->rotate_face($this->rotate_face());
      break;
      case 3:
        $mat=$this->rotate_face($this->rotate_face($this->rotate_face()));
      break;
      
    }
    
    return $mat; 
  }
  
}

?>