<?php

use TestAfter\PerfectNumberFinder;
class PerfectNumberFinderTest extends PHPUnit_Framework_TestCase {

    private $PERFECT_NUMS = array(6,28,496,8128,/*33550336*/);

    /**
     * Sprawdzamy czy prawidlowo okresla liczby doskonałe
     * jako doskonałe
     */
    public function testPerfection () {
        foreach($this->PERFECT_NUMS as $perfNum ) {
            $this->assertTrue(PerfectNumberFinder::isPerfect($perfNum), 'test for:'.$perfNum);
        }
    }

    /**
     *
     * Enter description here ...
     */
    public function testNonPerfection() {
        for ($i = 2; $i < 10000; $i++) {
            if(!in_array($i,$this->PERFECT_NUMS)) {
                $this->assertFalse(PerfectNumberFinder::isPerfect($i));
            }
        }
    }
}