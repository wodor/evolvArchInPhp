<?php

use TestBefore\Classifier;
class ClassifierTest extends PHPUnit_Framework_TestCase {

 private $PERFECT_NUMS = array(6,28,496,8128,/*33550336*/);

    /**
     * Sprawdzamy czy prawidlowo okresla liczby doskonałe
     * jako doskonałe
     */
    public function testPerfection () {
        foreach($this->PERFECT_NUMS as $perfNum ) {
            $classifier = new Classifier($perfNum);
            $this->assertTrue($classifier->isPerfect(), 'test for:'.$perfNum);
        }
    }

    /**
     *
     * Enter description here ...
     */
    public function testNonPerfection() {
        for ($i = 2; $i < 10000; $i++) {
            if(!in_array($i,$this->PERFECT_NUMS)) {
                $classifier = new Classifier($i);
                $this->assertFalse($classifier->isPerfect());
            }
        }
    }


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
        $expected = $this->getFactorsInExpectedFormat(array(1,2,3,6));

        $classifier = new Classifier(6);

        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);

        $this->assertEquals($expected, $getFactors->invoke($classifier));
    }

    public function testFactorsFor100() {
        $expected = $this->getFactorsInExpectedFormat(array(1, 100, 2, 50, 4, 25, 5, 20, 10));

        $classifier = new Classifier(100);

        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);

        $this->assertEquals($expected, $getFactors->invoke($classifier));
    }


    public function teDISABLEDstFactorsForMaxInt() {
        $classifier = new Classifier(PHP_INT_MAX);
        $this->assertContains(2147483647, $classifier-getFactorsMethod()->invoke($classifier));
    }

    public function testAddFactor() {

        $classifier = $this->getMockBuilder('\TestBefore\Classifier')
            ->disableOriginalConstructor()
            ->setMethods(array('none'))
            ->getMock();

        $numberProperty = new ReflectionProperty('\TestBefore\Classifier', 'number');
        $numberProperty->setAccessible(true);
        $numberProperty->setValue($classifier,36);


        $addFactor = new ReflectionMethod('\TestBefore\Classifier', 'addFactor');
        $addFactor->setAccessible(true);

        $addFactor->invoke($classifier,2); // dodaje 36/3 = 18
        $addFactor->invoke($classifier,3); // dodaje 36/3 = 12

        $this->assertEquals($this->getFactorsInExpectedFormat(array(2,3,12,18)), $this->getFactorsMethod()->invoke($classifier));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionOnNegativeNumber() {
        $classifier = new Classifier(-5);
    }



    private function getFactorsInExpectedFormat($array) {
       return array_combine($array,$array);
    }

    private function getFactorsMethod() {
        $getFactors = new ReflectionMethod('\TestBefore\Classifier', 'getFactors');
        $getFactors->setAccessible(true);
        return $getFactors;
    }


}