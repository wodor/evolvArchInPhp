<?php
namespace TestBefore;

class Classifier {

    public static function isFactor($factor, $number) {
        return $number % $factor == 0;
    }

}