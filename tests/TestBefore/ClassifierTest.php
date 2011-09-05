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
        $expected = array(1=>1,2=>2,3=>3,6=>6);

        $classifier = new Classifier(6);

        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);

        $this->assertEquals($expected, $getFactors->invoke($classifier));
    }

    public function testFactorsFor100() {
        $expected = $this->getFactorsInExpectedFormat(1, 100, 2, 50, 4, 25, 5, 20, 10);

        $classifier = new Classifier(6);

        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);

        $this->assertEquals($expected, $getFactors->invoke($classifier));
    }

    public function testAddFactor() {

        $classifier = $this->getMockBuilder('\TestBefore\Classifier')
            ->disableOriginalConstructor()
            ->setMethods(array('none'))
            ->getMock();

        $addFactor = new ReflectionMethod('\TestBefore\Classifier', 'addFactor');
        $addFactor->setAccessible(true);

        $addFactor->invoke($classifier,2);
        $addFactor->invoke($classifier,77);

        $this->assertEquals(array(2=>2,77=>77), $this->getFactorsMethod()->invoke($classifier));
    }

    private getFactorsInExpectedFormat($array) {
       return array_combine($array,$array);

    }

    private function getFactorsMethod() {
        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);
        return $getFactors;
    }


}