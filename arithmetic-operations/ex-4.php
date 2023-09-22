<?

$number = 10;
$factorial = 1;

for ($i = 1; $i <= $number; $i++) {
    $factorial *= $i;
}

echo "The factorial of {$number} is {$factorial}\n";
