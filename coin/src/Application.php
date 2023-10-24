<?php
namespace Coin;
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


            // Retrieve the API data
            $apiData = $apiDataRetriever->retrieveApiData($apiUrl);

            // Process the API data
            $apiDataProcessor->processApiData($apiData);

            // Get the populated currencies
            $currencies = $currencyCollection->getCurrencies();

            // Use the currencies as needed
            foreach ($currencies as $currency) {
                /** @var Currency $currency
                 */
                echo "Code: " . $currency->getCode() . "\n";
                echo "Symbol: " . $currency->getSymbol() . "\n";
                echo "Rate: " . $currency->getRate() . "\n";
                echo "Description: " . $currency->getDescription() . "\n";
                echo "Date: " . $currency->getCurrentDateTime() . "\n";
                echo "------------------------\n";
            }
       }
}


