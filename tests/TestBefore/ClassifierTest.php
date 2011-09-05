<?php

use TestBefore\Classifier;
class ClassifierTest extends PHPUnit_Framework_TestCase {


    public function testIs1aFactorOf10() {
        $classifier = new Classifier(10);
        $this->assertTrue($classifier->isFactor(1,10));
    }

    public function testFactorsFor() {
        $expected = array(1);
        $classifier = new Classifier(1);
        $this->assertSame($expected, $classifier->getFactors(1));
    }

}