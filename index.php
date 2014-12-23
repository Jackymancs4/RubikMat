<?php

class RubiksMat {

  public $color=array("r","g","b","o","y","w");
  public $cube=array();
  public $chains=array();

  public $main=3;
  
  public $n=3;
  public $m=6;
  
  function RubiksMat() {
    
    $this->chains[]=array(1,5,2,4);
    $this->chains[]=array(3,5,0,4);
    $this->chains[]=array(2,5,1,4);
    $this->chains[]=array(0,5,3,4);
    $this->chains[]=array(0,2,3,1);
    $this->chains[]=array(0,1,3,2);
  
    for($h=0;$h<$this->m;$h++) {
      for($i=0;$i<$this->n;$i++){
        for($j=0;$j<$this->n;$j++){
          $this->cube[$h][$i][$j]=$this->color[$h];
        }
      }
    }
  }
   
  public function stampa () {
    for($h=0;$h<$this->m;$h++) {
      echo "<table>";
      for($i=0;$i<$this->n;$i++){
        echo "<tr>";
        for($j=0;$j<$this->n;$j++){
          echo "<td>".$this->cube[$h][$i][$j]."</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
    }
  }
  
  private function get_n($face,$num) {
    
    $set = array();
    
    for($i=0;$i<$this->n;$i++){
      if($face==0 || $face==3) {
        $set[]=$this->cube[$face][$num][$i];
      } else {
        $set[]=$this->cube[$face][$i][$num];
      }
    }
    //print_r($riga);
    return $set;
  }
  
  private function set_n($face,$num,$set) {
    $ret=$this->get_n($face,$num);
    
    for($i=0;$i<$this->n;$i++){
      if($face==0 || $face==3) {
        $this->cube[$face][$i][$num]=$set[$i];
      } else {
        $this->cube[$face][$num][$i]=$set[$i];
      }
    }
    
    return $ret;
  } 
  
  public function ruota($face,$num,$dir) {
    
    $chain=$this->chains[$face];
    
    $riga=$this->get_n($chain[count($chain)-1],$num);
    
    foreach($chain as $near) {
      $riga=$this->set_n($near,$num,$riga);  
    }
    
    
    return 0;
  }

}

$rub=new RubiksMat();

$rub->stampa();
$rub->ruota(0,1,1);
$rub->ruota(1,1,1);

echo "<br>";
$rub->stampa();


?>