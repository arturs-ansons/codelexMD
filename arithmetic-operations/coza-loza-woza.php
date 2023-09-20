<?php

for ($i = 0; $i <= 110; $i++) {
    $output = "";

    if ($i % 3 === 0) {
        $output .= "Coza";
    }
    if ($i % 5 === 0) {
        $output .= "Loza";
    }
    if ($i % 7 === 0) {
        $output .= "Woza";
    }

    // If none of the conditions above were met, use the number itself
    if (empty($output)) {
        $output = $i;
    }

    echo $output . ' ';

    // Add a new line after every 11th output
    if ($i % 11 === 0) {
        echo "\n";
    }
}
