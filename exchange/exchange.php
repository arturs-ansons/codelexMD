<?php
class CurrencyConverter
{
    private string $exchangeRateApiUrl = "https://api.apilayer.com/exchangerates_data/latest";
    private string $apiAccessKey = "97a772f513053dc4ea636c7e043bb411";

    public function convert($amount, $fromCurrency, $toCurrency): float|int|null
    {
        $url = "$this->exchangeRateApiUrl?apikey=$this->apiAccessKey&from=$fromCurrency&to=$toCurrency";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['rates'][$toCurrency])) {
            $exchangeRate = $data['rates'][$toCurrency];
            $convertedAmount = $amount * $exchangeRate;
            return $convertedAmount;
        } else {
            return null;
        }
    }
}

if ($argc != 4) {
    echo "Usage: php exchange.php <amount> <from_currency> <to_currency>\n";
    exit(1);
}

$amount = floatval($argv[1]);
$fromCurrency = strtoupper($argv[2]);
$toCurrency = strtoupper($argv[3]);

$currencyConverter = new CurrencyConverter();
$convertedAmount = $currencyConverter->convert($amount, $fromCurrency, $toCurrency);

if ($convertedAmount !== null) {
    echo "$amount $fromCurrency is equal to $convertedAmount $toCurrency\n";
} else {
    echo "Currency conversion failed. Please check your inputs and try again.\n";
}
