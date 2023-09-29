<?php


// Initialize the game board
$board = [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '];

// Function to display the game board
function displayBoard($board)
{
    echo " {$board[0]} | {$board[1]} | {$board[2]}\n";
    echo "---+---+---\n";
    echo " {$board[3]} | {$board[4]} | {$board[5]}\n";
    echo "---+---+---\n";
    echo " {$board[6]} | {$board[7]} | {$board[8]}\n";
}

// Function to check if a player has won
function checkWin($board, $player)
{
    $winningCombos = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columns
        [0, 4, 8], [2, 4, 6] // Diagonals
    ];

    foreach ($winningCombos as $combo) {
        if ($board[$combo[0]] == $player && $board[$combo[1]] == $player && $board[$combo[2]] == $player) {
            return true;
        }
    }

    return false;
}

// Function to check if the game is a tie
function checkTie($board)
{
    return !in_array(' ', $board);
}

// Initialize the current player
$currentPlayer = 'X';

// Game loop
while (true) {
    displayBoard($board);
    echo "Player $currentPlayer's turn. Enter your move (1-9): ";
    $move = intval(readline()) - 1;

    // Check if the move is valid
    if ($move < 0 || $move > 8 || $board[$move] != ' ') {
        echo "Invalid move. Try again.\n";
        continue;
    }

    // Make the move
    $board[$move] = $currentPlayer;

    // Check for a win
    if (checkWin($board, $currentPlayer)) {
        displayBoard($board);
        echo "Player $currentPlayer wins! Congratulations!\n";
        break;
    }

    // Check for a tie
    if (checkTie($board)) {
        displayBoard($board);
        echo "It's a tie! Good game!\n";
        break;
    }

    // Switch to the other player
    $currentPlayer = ($currentPlayer === 'X') ? 'O' : 'X';
}

