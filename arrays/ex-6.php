<?php

// List of words to choose from
$words = ["elephant", "giraffe", "zebra", "tiger", "lion"];

// Select a random word from the list
$word = $words[array_rand($words)];

// Convert the word to an array of characters
$wordArray = str_split($word);

// Initialize variables
$guesses = [];
$maxTries = 6;
$attempts = 0;

// main game loop
while ($attempts < $maxTries) {
    // Display the current word with underscores for unguessed letters
    $displayWord = "";
    foreach ($wordArray as $letter) {
        if (in_array($letter, $guesses)) {
            $displayWord .= $letter . " ";
        } else {
            $displayWord .= "_ ";
        }
    }

    // Display game status
    echo "Word: $displayWord\n";
    echo "Misses: " . implode(" ", array_diff($guesses, $wordArray)) . "\n";

    // Prompt for a guess
    echo "Guess: ";
    $guess = strtolower(trim(fgets(STDIN)));

    // Check if the guess is a single letter
    if (strlen($guess) !== 1 || !ctype_alpha($guess)) {
        echo "Please enter a single letter.\n";
        continue;
    }

    // Add the guess to the list of guesses
    $guesses[] = $guess;

    // Check if the guess is correct
    if (in_array($guess, $wordArray)) {
        echo "Correct!\n";
    } else {
        echo "Incorrect.\n";
        $attempts++;
    }

    // Check if the player has guessed all letters
    if (array_diff($wordArray, $guesses) === []) {
        echo "YOU GOT IT!\n";
        break;
    }
}

// Check if the player has run out of tries
if ($attempts >= $maxTries) {
    echo "Out of tries. The word was: $word\n";
}

echo "Play 'again' or 'quit'? ";
$playAgain = strtolower(trim(fgets(STDIN)));
if ($playAgain === 'quit') {
    echo "Thanks for playing!\n";
} elseif ($playAgain === 'again') {
    // Restart the game
    echo "\n";
} else {
    echo "Invalid input. Exiting.\n";

}

