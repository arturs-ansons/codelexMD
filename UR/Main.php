<?php

require_once('ApiClient.php'); // Make sure the path is correct.

class MainClass {
    public static function main() {
        echo "Ievadiet meklēšanas parametrus, uzņēmuma nosaukumu vai reģistrācijas nummuru: ";
        $searchQuery = readline();

        $apiUrl = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=" . urlencode($searchQuery) . "&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=5";

        $apiClient = new ApiClient($apiUrl);
        $apiClient->getData();
    }
}

MainClass::main();

