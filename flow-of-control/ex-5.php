<?php
$phonePad = [
    'ABC' => 2,
    'DEF' => 3,
    'GHI' => 4,
    'JKL' => 5,
    'MNO' => 6,
    'PQRS' => 7,
    'TUV' => 8,
    'WXYZ' => 9
];
$quit = "quit";
$keyNumber = [];

while (true) {
    $userInput = readline("Dial number (or type 'quit' to exit): ");

    if ($userInput === $quit) {
        echo "Goodbye!\n";
        break;
    }if (array_key_exists($userInput, $phonePad)) {
        $number = $phonePad[$userInput];
        $keyNumber[] = $number;
    } else {
        echo "The input is not a valid letter combination.\n";
    }

    // Display dialed numbers
    echo "Dialed numbers: " . implode($keyNumber) . "\n";
}
