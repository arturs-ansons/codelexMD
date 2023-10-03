<?php

echo "Enter first word: ";
$firstWord = (string)readline();

echo "Enter second word: ";
$secondWord = (string)readline();

$totalLength = 30;
$dotsCount = $totalLength - strlen($firstWord) - strlen($secondWord);

// Subtract 1 from $dotsCount to ensure exactly one dot between words
$dotsCount--;

// Populate the $dots array with dots using str_repeat
//$dots = str_repeat('.', $dotsCount);
$dots = [];
for ($i = 1; $i <= $dotsCount; $i++) {
    $dots[] = '.';
}
$result = $firstWord . implode($dots) . $secondWord;

echo $result . PHP_EOL;


