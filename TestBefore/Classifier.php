<?php
namespace TestBefore;

class Classifier {

    private $number;

    private $factors;

    private $factorsCalculated = false;


    public function __construct($number){
        $this->number = $number;
        $this->addFactor(1);
        $this->addFactor($number);
        $this->calculateFactors();
    }

    private function isFactor($factor) {
        return $this->number % $factor == 0;
    }

    private function getFactors() {
        return $this->factors;
    }

    private function addFactor($factor) {
        $this->factors[(int)$factor] = $factor;
    }

    private function calculateFactors() {
        for($i = 2; $i < $this->number; $i++) {
            if($this->isFactor($i)) {
                $this->addFactor($i);
            }
        }
    }


}