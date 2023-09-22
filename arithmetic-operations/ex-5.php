<?php

$randomNumber = rand(1, 100);
$attempts = 0;

echo "I'm thinking of a number between 1-100. Try to guess it.\n";

while (true) {
    $guess = readline("> ");

    if (!is_numeric($guess)) {
        echo "Please enter a valid number.\n";
        continue;
    }

    $guess = (int)$guess;
    $attempts++;

    if ($guess === $randomNumber) {
        echo "You guessed it! What are the odds?!?\n";
        break;
    } elseif ($guess < $randomNumber) {
        echo "Sorry, you are too low. I was thinking of {$randomNumber}.\n";
    } else {
        echo "Sorry, you are too high. I was thinking of {$randomNumber}.\n";
    }
}

echo "It took you {$attempts} attempts to guess the number.\n";