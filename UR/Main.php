<?php
require_once('Company.php');
require_once('CompanyCollection.php');
require_once('ApiDataProcessor.php');
require_once('ApiClient.php');

class MainClass {
    public static function main() {
        echo "Ievadiet meklēšanas parametrus, uzņēmuma nosaukumu vai reģistrācijas nummuru: ";
        $searchQuery = readline();

        $apiUrl = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=" . urlencode($searchQuery) . "&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=5";

        $companyCollection = new CompanyCollection();
        $apiDataProcessor = new ApiDataProcessor($companyCollection);
        $apiClient = new ApiClient($apiUrl, $apiDataProcessor, $companyCollection);

        $apiClient->getData();
    }
}

MainClass::main();