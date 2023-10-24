<?php


$userCash = (int)readline("Please enter the amount you want to play with: ");
echo "Thx and Good luck! Your balance is: $$userCash\n";

$cherries = [
    10 => 'A',
    8 => 'B',
    6 => 'C',
    3 => 'D',  // Include key 3
];

// Function to check if there's a win on the board
function checkWin($board)
{
    $winningCombos = [
        // Rows
        [[0, 0], [0, 1], [0, 2], [0, 3]],
        [[1, 0], [1, 1], [1, 2], [1, 3]],
        [[2, 0], [2, 1], [2, 2], [2, 3]],

        // Columns
        [[0, 0], [1, 0], [2, 0]],
        [[0, 1], [1, 1], [2, 1]],
        [[0, 2], [1, 2], [2, 2]],
        [[0, 3], [1, 3], [2, 3]],

        // Diagonals
        [[0, 0], [1, 1], [2, 2]],
        [[0, 3], [1, 2], [2, 1]],
    ];

    foreach ($winningCombos as $combo) {
        $symbols = [];
        foreach ($combo as $cell) {
            $symbols[] = $board[$cell[0]][$cell[1]];
        }
        if (count(array_unique($symbols)) === 1 && $symbols[0] !== ' ') {
            return true;
        }
    }

    return false;
}

// Function to display the board
function displayBoard($board)
{
    foreach ($board as $row) {
        foreach ($row as $element) {
            echo $element . ' ';
        }
        echo PHP_EOL; // Move to the next line after each row
    }
}

while ($userCash >= 10) { // Require at least $10 to play each spin
    $userCash -= 10; // Deduct the ticket cost

    // Create and display the board
    $board = [
        [' ', ' ', ' '],
        [' ', ' ', ' '],
        [' ', ' ', ' '],
    ];

    displayBoard($board);

    if (checkWin($board)) {
        echo "Congratulations! You win!\n";
        $userCash += 2000;
    } else {
        echo "No win this time. Your cash: $$userCash\n";
    }
}

echo "Insufficient funds to play. Goodbye!\n";
