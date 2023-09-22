<?php

function calculateCircleArea($radius) {

    $area = M_PI * pow($radius, 2);
        return $area;

}

$radius = 5;
$area = calculateCircleArea($radius);

if (is_numeric($area)) {
    echo "The area of the circle with radius {$radius} is {$area} square units.\n";
}

