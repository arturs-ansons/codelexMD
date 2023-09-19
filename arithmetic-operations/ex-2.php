<?php

function CheckOddEven($number) {
    if ($number % 2 == 0) {
        echo "Even Number\n";
    } else {
        echo "Odd Number\n";
    }
    echo "bye!\n";
}

$number = 7;
CheckOddEven($number);