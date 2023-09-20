<?php
// Prompt the user to enter elements separated by commas
$userElements = readline("Enter your elements separated by commas (e.g., rock, paper, scissors): ");
$elements = array_map('trim', explode(',', $userElements));

if (count($elements) < 2) {
    echo "You must enter at least two elements.\n";
    exit();
}

$userSelection = readline('Enter your element (' . implode(', ', $elements) . "): ");

if (!in_array(strtolower($userSelection), $elements)) {
    echo "Wrong element selected.\n";
    exit();
}

// Generate the computer's choice
$computerSelection = $elements[array_rand($elements)];

echo "Computer selected: $computerSelection\n";

// Determine the winner
if ($userSelection === $computerSelection) {
    echo "It's a tie!\n";
} else {
    $userIndex = array_search($userSelection, $elements);
    $computerIndex = array_search($computerSelection, $elements);

    if (($userIndex + 1) % count($elements) === $computerIndex) {
        echo "You win!\n";
    } else {
        echo "Computer wins!\n";
    }
}
