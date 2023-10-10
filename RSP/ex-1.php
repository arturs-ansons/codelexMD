<?php

$elements = [
    "rock" => ["paper"],
    "paper" => ["scissors"],
    "scissors" => ["rock"]
];

$userSelection = readline('Enter your element (' . implode(', ', array_keys($elements)) . "): ");

if (!isset($elements[strtolower($userSelection)])) {
    echo "Wrong element selected.\n";
    exit();
}

$computerSelection = array_rand($elements);

echo "Computer selected: $computerSelection\n";

if ($userSelection === $computerSelection) {
    echo "It's a tie!\n";
} elseif (in_array($userSelection, $elements[$computerSelection])) {
    echo "You win!\n";
} else {
    echo "Computer wins!\n";
}



