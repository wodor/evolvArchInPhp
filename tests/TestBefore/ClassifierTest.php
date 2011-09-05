<?php

use TestBefore\Classifier;
class ClassifierTest extends PHPUnit_Framework_TestCase {


    public function testIs1aFactorOf10() {
        $classifier = new Classifier(10);

        $isFactor = new ReflectionMethod('\TestBefore\Classifier', 'isFactor');
        $isFactor->setAccessible(true);

        $this->assertTrue($isFactor->invoke($classifier,1));
    }

    public function testFactorsFor1() {
        $expected = array(1);

        $classifier = new Classifier(1);

        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);

        $this->assertSame($expected, $getFactors->invoke($classifier));
    }

    public function testFactorsFor6() {
        $expected = array(1,2,3,6);

        $classifier = new Classifier(6);

        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);

        $this->assertSame($expected, $getFactors->invoke($classifier));
    }
}