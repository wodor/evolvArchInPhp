<?php

namespace TestAfter;

class  PerfectNumberFinder {


    public static function isPerfect($number) {
        // get factors
        $factors =  array();

        $factors[] = 1;
        $factors[] = $number;
        for ( $i = 2; $i < sqrt($number); $i++) {
            // dodajemy w parach 36 = 2*18 = 3*12 = 4*9, latwo policzyc drugi
            if ($number % $i == 0){
                $factors[] = $i;
                if($number/$i != $i) {
                    $factors[] = $number/$i;
                }
            }
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