<?php
namespace TestBefore;

class Classifier {

    private $number;

    private $factors;

    private $factorsCalculated = false;


    public function __construct($number){
        if($number <= 0 ) {
            throw  new \InvalidArgumentException("negative numbers are never perfect");
        }
        $this->number = $number;
        $this->addFactor(1);
        $this->addFactor($number);
        $this->calculateFactors();
    }

    public function isPerfect() {
        $this->calculateFactors(); // gdyby to bylo tutaj od poczatku testy bylyby latwiejsze
        return array_sum($this->getFactors()) - $this->number == $this->number;
    }

    private function isFactor($factor) {
        return $this->number % $factor == 0;
    }

    private function getFactors() {
        return $this->factors;
    }

    private function addFactor($factor) {
        $this->factors[(int)$factor] = $factor;
        $this->factors[(int)($this->number/$factor)] =  $this->number/$factor;
    }

    private function calculateFactors() {
        for($i = 2; $i <= sqrt($this->number); $i++) {
            if($this->isFactor($i)) {
                $this->addFactor($i);
            }
        }
    }


}