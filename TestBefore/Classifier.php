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
        return array($this->number);
    }

}