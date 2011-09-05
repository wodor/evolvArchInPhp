<?php

use TestBefore\Classifier;
class ClassifierTest extends PHPUnit_Framework_TestCase {


    public function testIs1aFactorOf10() {
        $this->assertTrue(Classifier::isFactor(1,10));
    }



}