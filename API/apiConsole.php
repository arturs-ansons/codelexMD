<?php

function getData(){
    $json = file_get_contents("https://rickandmortyapi.com/api/episode");
    $data = json_decode($json);
    if ($data) {
        foreach ($data->results as $episode) {
            echo "Episode: " . $episode->episode . "\n";
            echo "Name: " . $episode->name . "\n";
            echo "Air Date: " . $episode->air_date . "\n\n"; // Add an extra newline for separation
        }
    } else {
        echo "Failed to fetch data from the API.";
    }
}


