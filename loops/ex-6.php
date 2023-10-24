<?php
class AsciiFigure
{
    const SIZE = 5;

    public static function drawFigure()
    {
        for ($i = 0; $i < self::SIZE; $i++) {
            // Print leading slashes
            for ($j = self::SIZE - 1; $j > $i; $j--) {
                echo "/";
            }

            // Print asterisks
            for ($k = 0; $k < $i * 2; $k++) {
                echo "*";
            }

            // Print trailing backslashes
            for ($j = self::SIZE - 1; $j > $i; $j--) {
                echo "\\";
            }

            echo PHP_EOL; // Move to the next line
        }
    }
}

AsciiFigure::drawFigure();
