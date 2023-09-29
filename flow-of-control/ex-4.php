<?php
$daysOfWeek = [
    "monday" => 1,
    "tuesday" => 2,
    "wednesday" => 3,
    "thursday" => 4,
    "friday" => 5,
    "saturday" => 6,
    "sunday" => 7
];
$userInput = strtolower(readline("Enter a day of the week: "));
$quite = "quit";

if ($userInput === $quite) {
    echo "You left the chat.\n";
    exit();
}
if ($dayNumber = $daysOfWeek[$userInput]) {
    echo "Day of the week: " . $dayNumber . "\n";
} else {
    echo "The input is not a valid day of the week.\n";
}
