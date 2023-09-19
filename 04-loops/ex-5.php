<?php
session_start();

// Initialize the tic-tac-toe board in a session variable
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = [
        ['', '', ''],
        ['', '', ''],
        ['', '', ''],
    ];
}

// Function to check for a win
function checkWin($board, $player)
{
    // Check rows, columns, and diagonals
    for ($i = 0; $i < 3; $i++) {
        if (
            ($board[$i][0] == $player && $board[$i][1] == $player && $board[$i][2] == $player) ||
            ($board[0][$i] == $player && $board[1][$i] == $player && $board[2][$i] == $player)
        ) {
            return true;
        }
    }

    if (
        ($board[0][0] == $player && $board[1][1] == $player && $board[2][2] == $player) ||
        ($board[0][2] == $player && $board[1][1] == $player && $board[2][0] == $player)
    ) {
        return true;
    }

    return false;
}

// Handle player moves
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = (int)$_POST['row'];
    $col = (int)$_POST['col'];

    $board = $_SESSION['board'];

    if ($row >= 0 && $row < 3 && $col >= 0 && $col < 3 && $board[$row][$col] == '') {
        $board[$row][$col] = 'X';

        // Check for a win
        if (checkWin($board, 'X')) {
            echo "Player X wins!";
            session_destroy();
        } else {
            // Implement computer player or multiplayer logic here
            // For a basic example, you can switch to player O or implement AI logic.
            $_SESSION['board'] = $board;
            header('Location: ex-5.php'); // Redirect to the game board
        }
    }
}

// Display the game board
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe</title>
    <style>
        table {
            border-collapse: collapse;
            width: 300px;
            height: 300px;
            margin: 0 auto; /* Center horizontally */
            margin-top: 100px; /* Add top margin for vertical centering (adjust as needed) */
        }

        td {
            width: 100px;
            height: 100px;
            text-align: center;
            vertical-align: middle;
            font-size: 24px;
            font-weight: bold;
            border: 2px solid #333;
        }
        .hidden-button {
            display: none;
        }
    </style>
</head>
<body>
<h1>Tic-Tac-Toe</h1>
<table>
    <?php
    $board = $_SESSION['board'];
    for ($row = 0; $row < 3; $row++) {
        echo "<tr>";
        for ($col = 0; $col < 3; $col++) {
            echo "<td>";
            if ($board[$row][$col] == '') {
                // Display a form for player moves
                echo "<form method='post'>";
                echo "<input type='hidden' name='row' value='$row'>";
                echo "<input type='hidden' name='col' value='$col'>";
                echo "<input type='submit' value='' class='hidden-button' disabled>";
                echo "</form>";
            } else {
                // Display the X or O on the board
                echo $board[$row][$col];
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
