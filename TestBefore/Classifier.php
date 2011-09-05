<?php
namespace TestBefore;

class Classifier {

    private $number;

    public function __construct($number){
        $this->number = $number;
    }

    public function isFactor($factor) {
        return $this->number % $factor == 0;
    }

    public function getFactors($number) {
        return array($this->number);
    }

}