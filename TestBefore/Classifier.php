<?php
namespace TestBefore;

class Classifier {

    private $number;

    private $factors;

    public function __construct($number){
        $this->number = $number;
    }

    private function isFactor($factor) {
        return $this->number % $factor == 0;
    }

    private function getFactors() {

        return $this->factors;
    }

    private function addFactor() {

    }

}