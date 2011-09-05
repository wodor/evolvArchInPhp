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
            $this->assertTrue(PerfectNumberFinder::isPerfect($perfNum));
        }
    }




}
