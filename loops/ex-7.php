<?php
class RollTwoDice
{
    public static function rollTwoLogic()
    {
        echo "Desired sum: ";
        $sumUserInput = (int)trim(fgets(STDIN));

        do {
            $num1 = rand(1, 6);
            $num2 = rand(1, 6);
            $sum = $num1 + $num2;
            echo "$num1 + $num2 = $sum\n";
        } while ($sum != $sumUserInput);

        echo "You got the desired sum: $sumUserInput\n";
    }
}

RollTwoDice::rollTwoLogic();
