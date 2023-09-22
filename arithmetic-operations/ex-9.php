<?php
$weight = 77; // Weight in kilograms
$height = 175; // Height in centimeters

// Convert height to meters (1 meter = 100 centimeters)
$heightInMeters = $height / 100;

// Calculate BMI
$bmi = $weight / ($heightInMeters * $heightInMeters);

if($bmi > 18.5 && $bmi < 25){
    echo "BMI: {$bmi}\n";
    echo "Great you are fit";
}if($bmi > 25){
    echo "BMI: {$bmi}\n";
    echo "Bad news you are fat";
}if($bmi < 18.5){
    echo "BMI: {$bmi}\n";
    echo "Bad news you are too skinny";
}

