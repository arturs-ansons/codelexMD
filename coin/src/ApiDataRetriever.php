<?php
namespace Coin;
class ApiDataRetriever
{
    public function retrieveApiData(string $apiUrl): string
    {

        $apiData = file_get_contents($apiUrl);

        if ($apiData === false) {
            echo 'Failed to retrieve API data';
        }

        return $apiData;
    }
}