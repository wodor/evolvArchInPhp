<?php

namespace TestAfter;

class PerfectNumberFinder {


    public static function isPerfect($number) {
        // get factors
        $factors =  array();

        $factors[] = 1;
        $factors[] = $number;
        for ( $i = 2; $i < number; $i++) {
            if ($number % $i == 0)
                $factors[] = $i;
        }

        // sum factors
        $sum = 0;
        foreach ($factors as $n) {
            $sum += $n;
        }

        // decide if it's perfect
        return $sum - $number == $number;
    }
}