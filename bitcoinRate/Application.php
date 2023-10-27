<?php
include_once 'GetApi.php';

class Application
{
    public function getData()
    {
        $currency = strtoupper(readline("Please choose LTC or ETH: "));

        $coinTo = new GetApi();
        $result = $coinTo->convert($currency);

        if ($result !== null) {
            $symbol = $result['symbol'];
            $lastPrice = $result['lastPrice'];
            echo "Symbol: $symbol, Last Price: $lastPrice\n";
        } else {
            echo "Currency conversion failed. Please check your input and try again.\n";
        }
    }
}

// Usage:
$application = new Application();
$application->getData();

