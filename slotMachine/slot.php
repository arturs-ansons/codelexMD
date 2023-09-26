<?php

$userCash = (int) readline("Please enter the amount you want to loose: ");
echo "Thx and Good luck! Your balance is: $userCash $\n";
$cherries = [
    0 => 'A',
    1 => 'B',
    2 => 'C',
    3 => 'D',
];
$board = [[], [], []];

// Create an array to store the columns
$columns = [];

// Define the displayBoard function outside of the loop
function displayBoard(array $board)
{
    foreach ($board as $row) {
        foreach ($row as $element) {
            echo $element . ' ';
        }
        echo PHP_EOL; // Move to the next line after each row
    }
}

while ($userCash >= 1) { // Require at least $10 to play each spin
    // Reset the board and columns before each spin
    $board = [[], [], []];
    $columns = [];

    // Ask the user how many tickets they want to buy for this spin
    $ticketsToBuy = (int) readline("Enter the amount you wanna play: ");

    // Calculate the ticket cost based on the number of tickets bought
    $ticketCost = $ticketsToBuy;

    // Check if the user has enough cash to buy the tickets
    if ($ticketCost > $userCash) {
        echo "You don't have enough cash to buy $ticketsToBuy tickets. Your cash: $$userCash\n";
        break; // Exit the loop if the user doesn't have enough cash
    }

    // Deduct the ticket cost from the user's cash
    $userCash -= $ticketCost;

    // Populate the columns with the indices of cherries
    $indices = array_keys($cherries);
    foreach ($indices as $index) {
        shuffle($indices); // Shuffle the indices randomly for each column
        $columns[] = $indices;
    }

    // Populate the rows using the columns
    for ($i = 0; $i < count($board); $i++) {
        foreach ($columns as $column) {
            $board[$i][] = $cherries[array_shift($column)];
        }
    }

    // Call the function to display the board
    displayBoard($board);

    // Check for a win based on the first row
    $firstRow = $board[0];
    $secondRow = $board[1];
    $winningCount = 0;

    foreach ($firstRow as $element) {
        if ($element === $firstRow[0]) {
            $winningCount++;
        }else {
            break; // If a different letter is encountered, stop checking
        }
    }

    if ($winningCount >= 4) {
        echo "You win 2000$$$. Your cash: $$userCash\n";
        $userCash += 2000;
    } elseif ($winningCount >= 3) {
        echo "You win 600$$$. Your cash: $$userCash\n";
        $userCash += 600;
    } elseif ($winningCount >= 2) {
        echo "You win 100$$$. Your cash: $$userCash\n";
        $userCash += 100;
    } else {
        echo "Your cash: $$userCash\n";
    }
}

echo "Insufficient funds, get more money and come back again!\n";

