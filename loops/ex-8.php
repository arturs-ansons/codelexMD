<?php

class NumberSquare
{
    public static function generateSquare()
    {

        echo "Min? ";
        $min = (int)readline();

        echo "Max? ";
        $max = (int)readline();

        for ($i = 0; $i <= $max - $min; $i++) {
            for ($j = $min + $i; $j <= $max; $j++) {
                echo $j;
            }
            for ($j = $min; $j < $min + $i; $j++) {
                echo $j;
            }
            echo PHP_EOL;
        }
    }
}


NumberSquare::generateSquare();
