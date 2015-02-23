<?php
class Cube {

  public $cube=array();

  function Cube ($dimension,$symbols=false) {
    $m=6;
     
    for ($i=0; $i<$m; $i++) {
      if ($symbols==false) {
        $this->cube[$i]=new Face($dimension,$i);
      } else {
        $this->cube[$i]=new Face($dimension,$symbols[$i]);
      }
    }
  }
  
  public function print_cube () {

    for($i=0;$i<count($this->cube);$i++){
      $this->cube[$i]->print_face();
      echo "<br>";
    }
  }

}
?>