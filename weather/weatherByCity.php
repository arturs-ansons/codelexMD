<?php

function getData($city)
{
    $apiKey = "0c1725f72d445b2b377c34209ba1341c";
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=$apiKey";

    extracted($url);
}

/**
 * @param string $url
 * @return void
 */
function extracted(string $url): void
{
    $json = file_get_contents($url);
    $data = json_decode($json);

    if ($data) {
        // Extract and display some key data points
        echo "Pilsēta: " . $data->city->name . "\n";
        echo "Valsts: " . $data->city->country . "\n";
        //echo "Latitude: " . $data->city->coord->lat . "\n";
        //echo "Longitude: " . $data->city->coord->lon . "\n";

        // Access and display weather information
        $weather = $data->list[0]->weather[0];

        $weatherId = $weather->id;

        if ($weatherId >= 200 && $weatherId < 300) {
            echo "Laiks: Vētra\n";
        } elseif ($weatherId >= 300 && $weatherId < 400) {
            echo "Laiks: Krusa\n";
        } elseif ($weatherId >= 500 && $weatherId < 600) {
            echo "Laiks: Lietus\n";
        } elseif ($weatherId >= 600 && $weatherId < 700) {
            echo "Laiks: Sniegs\n";
        } elseif ($weatherId >= 700 && $weatherId < 800) {
            echo "Laiks: Spiediens\n";
        } elseif ($weatherId === 800) {
            echo "Laiks: Skaidrs\n";
        } elseif ($weatherId >= 801 && $weatherId < 900) {
            echo "Laiks: Mākoņains\n";
        } else {
            echo "Laiks: Nav datu par laiku\n";
        }

        $main = $data->list[0]->main;
        $temperatureCelsius = $main->temp - 273.15; // Conversion from Kelvin to Celsius
        echo "Temperatūra: " . round($temperatureCelsius, 1) . "° C\n";
        echo "Spiediens: " . $main->pressure . " hPa\n";
        echo "Mitrums: " . $main->humidity . "%\n";
    } else {
        echo "Failed to decode JSON data.";
    }
}


$city = (string)readline("Please enter the city: ");
getData($city);

