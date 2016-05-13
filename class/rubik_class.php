<?php

class RubiksMat
{
    public $color = array('r', 'g', 'b', 'o', 'y', 'w');
    public $cube = array();

    public $n = 3;

    public function RubiksMat()
    {
        $this->cube = new Cube($this->n, $this->color);
    }
}
