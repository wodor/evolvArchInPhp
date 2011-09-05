<?php
namespace TestBefore;

class Classifier {

    private $number;

    public function __construct($number){
        $this->number = $number;
    }

    private function isFactor($factor) {
        return $this->number % $factor == 0;
    }

    private function getFactors() {

        $factors = array();
        $factors[] = 1;

        for($i = 2; $i < $this->number; $i++) {
            if($this->isFactor($i)) {
                $factors[] = $i;
            }
        }

        $factors[] = $this->number;
        // allow me not to solve problem that appears in c#
        // but not in PHP

        return $factors;
    }

}