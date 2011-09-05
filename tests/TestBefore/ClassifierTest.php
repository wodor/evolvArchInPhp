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
        $expected = array(1=>1);

        $classifier = new Classifier(1);

        $this->assertSame($expected,  $this->getFactorsMethod()->invoke($classifier));
    }

    public function testFactorsFor6() {
        $expected = array(1,2,3,6);

        $classifier = new Classifier(6);

        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);

        $this->assertSame($expected, $getFactors->invoke($classifier));
    }

    public function testAddFactor() {
        $classifier = new Classifier(6);

        $addFactor = new ReflectionMethod('\TestBefore\Classifier', 'addFactor');
        $addFactor->setAccessible(true);

        $addFactor->invoke($classifier,2);

        $this->assertEquals(array(1=>1,2=>2,6=>6), $this->getFactorsMethod()->invoke($classifier));
    }

    private function getFactorsMethod() {
        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);
        return $getFactors;
    }

}