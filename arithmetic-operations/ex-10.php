<?php

class Circle {
    public static function calculateCircle($radius) {

        if ($radius >= 0) {
            // Calculate the area using the formula
            $area = M_PI * pow($radius, 2);
            return $area;
        } else {

            return "Error: Radius should be non-negative.";
        }
    }
}

class Triangle {
    public static function calculateTriangle($length, $width) {

        if ($length >= 0 || $width >= 0) {
            // Calculate the area using the formula
            $area = $length * $width;
            return $area;
        } else {

            return "Error: Width and Length should be non-negative.";
        }
    }
}

class Rectangle {
    public static function calculateRectangle($base, $height) {

        if ($base >= 0 || $height >= 0) {
            // Calculate the area using the formula
            $area = 0.5 * $base * $height;
            return $area;
        } else {

            return "Error: Width and Length should be non-negative.";
        }
    }
}

while (true) {
    // Display the menu
    echo "Geometry Calculator:\n";
    echo "1. Calculate the Area of a Circle\n";
    echo "2. Calculate the Area of a Triangle\n";
    echo "3. Calculate the Area of a Rectangle\n";
    echo "4. Quit\n";


    $choice = readline("Enter your choice (1-4): ");

    switch ($choice) {
        case 1:
            $radius = readline("Enter the radius of the circle: ");
            $areaOfCircle = Circle::calculateCircle($radius);

            if (is_numeric($areaOfCircle)) {
                echo "The area of the circle with radius {$radius} is {$areaOfCircle} .\n";
            } else {
                echo $areaOfCircle . "\n";
            }
            echo "You chose to calculate the Area of a Circle.\n";
            break;
        case 2:
            $length = readline("Enter the length of the triangle: ");
            $width = readline("Enter the width of the triangle: ");
            $areaOfTriangle = Triangle::calculateTriangle($length, $width);

            if (is_numeric($areaOfTriangle)) {
                echo "The area of the triangle with length {$length}, triangle with width {$width}  is {$areaOfTriangle} .\n";
            } else {
                echo $areaOfTriangle . "\n";
            }
            echo "You chose to calculate the Area of a Triangle.\n";
            break;
        case 3:
            $length = readline("Enter the length of the rectangle: ");
            $width = readline("Enter the width of the rectangle: ");
            $areaOfRectangle = Rectangle::calculateRectangle($length, $width);

            if (is_numeric($areaOfRectangle)) {
                echo "The area of the rectangle with length {$length}, triangle with width {$width}  is {$areaOfRectangle} .\n";
            } else {
                echo $areaOfRectangle . "\n";
            }
            echo "You chose to calculate the Area of a Rectangle.\n";
            break;
        case 4:
            echo "Goodbye!\n";
            exit;
        default:
            echo "Invalid choice. Please enter a number between 1 and 4.\n";
    }
}

