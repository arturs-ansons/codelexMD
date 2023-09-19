<?php

function CheckOddEven($number) {
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

$number = 7;
CheckOddEven($number);
