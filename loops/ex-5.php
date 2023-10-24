<?php

class Piglet
{
    public static function pigletLogic()
    {
        echo "Welcome to Piglet!\n";

        $total = 0;

        do {
            $num = rand(1, 6);
            if ($num === 1) {
                $total = 0;
                echo "You rolled a 1. You lose all your points for this turn.\n";
            } else {
                $playAgain = strtolower(trim(readline("You rolled a $num\nRoll again? (y/n): ")));
                $total += $num;
            }

        } while ($playAgain === 'y' && $num !== 1);

        echo "Your total score is: $total\n";
    }
}

Piglet::pigletLogic();

