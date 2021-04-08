<?php

namespace App;

class FizzBuzz {

    public function forNumber($a)
    {
        $fizz = "Fizz";
        $buzz = "Buzz";
        $rarr = "Rarr";
        if ($a % 15 === 0) {
            return "{$fizz}{$buzz}";
            if ($a % 7 === 0) {
                return "{$fizz}{$buzz}{$rarr}";
            }
        }
        if ($a % 5 === 0) {
            return $buzz;
            if ($a % 7 === 0) {
                return "{$buzz}{$rarr}";
            }
        }
        if ($a % 3 === 0) {
            return $fizz;
            if ($a % 7 === 0){
                return "{$fizz}{$rarr}";
            }
        }
        return strval($a);
        // if(1 % $a === 0){
        //     return "1";
        // }
        // if (2 % $a === 0) {
        //     return "2";
        // }
        // if (4 % $a === 0) {
        //     return "4";
        // }
        // if (7 % $a == 0){
        //     return "7";
        // }
    }
}