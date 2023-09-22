<?php

$rock = "rock";
$paper  = "paper";
$scissors = "scissors";

$elements = [$rock, $paper, $scissors];

$userSelection = readline('Enter your element (' . implode(', ', $elements) . "): ");

if (!in_array(strtolower($userSelection), $elements)) {
    echo "Wrong element selected.\n";
    exit();
}

$computerSelection = $elements[array_rand($elements)];

echo "Computer selected: $computerSelection\n";

if ($userSelection === $computerSelection) {
    echo "It's a tie!\n";
} elseif (
    ($userSelection === $rock && $computerSelection === $scissors) ||
    ($userSelection === $scissors && $computerSelection === $paper) ||
    ($userSelection === $paper && $computerSelection === $rock)
) {
    echo "You win!\n";
} else {
    echo "Computer wins!\n";
}
