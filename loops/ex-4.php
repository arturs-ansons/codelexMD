<?php

class FizzBuzz
{
    public static function fizzBuzz()
    {
        echo "Max value? ";
        $num = (int)readline();

        for ($i = 0; $i <= $num; $i++) {
            $output = "";

            if ($i % 3 === 0) {
                $output .= "Fizz";
            }
            if ($i % 5 === 0) {
                $output .= "Buzz";
            }

            // If none of the conditions above were met, use the number itself
            if (empty($output)) {
                $output = $i;
            }

            echo $output . ' ';

            // Add a new line after every 11th output
            if ($i % 20 === 0) {
                echo "\n";
            }
        }
    }
}

FizzBuzz::fizzBuzz();