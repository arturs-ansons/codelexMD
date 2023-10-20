<?php
namespace coin;
class Application
{
    public function run(): void
    {
        // Initialize your CurrencyCollection and ApiDataProcessor
        $currencyCollection = new CurrencyCollection();
        $apiDataRetriever = new ApiDataRetriever();
        $apiDataProcessor = new ApiDataProcessor($currencyCollection);

        // Define the API URL as a string
        $apiUrl = 'https://api.coindesk.com/v1/bpi/currentprice.json';

        try {
            // Retrieve the API data
            $apiData = $apiDataRetriever->retrieveApiData($apiUrl);

            // Process the API data
            $apiDataProcessor->processApiData($apiData);

            // Get the populated currencies
            $currencies = $currencyCollection->getCurrencies();

            // Use the currencies as needed
            foreach ($currencies as $currency) {
                echo "Currency Code: " . $currency->getCode() . "\n";
                echo "Currency Symbol: " . $currency->getSymbol() . "\n";
                // ...other properties...
                echo "------------------------\n";
            }
        } catch (ApiException $e) {

            echo "An error occurred while retrieving API data: " . $e->getMessage();
        }
    }
}


