<?php
namespace Coin;
class ApiDataProcessor
{
    private CurrencyCollection $currencyCollection;

    public function __construct(CurrencyCollection $currencyCollection)
{
    $this->currencyCollection = $currencyCollection;
}

    public function processApiData(string $apiData): void
{
    // Process the API data as before
    $data = json_decode($apiData);

    if (isset($data->bpi)) {
        foreach ($data->bpi as $currencyCode => $currencyData) {
            $currency = new Currency(
                $currencyCode,
                $currencyData->symbol,
                $currencyData->rate,
                $currencyData->description,
                $currencyData->rate_float
            );
            $this->currencyCollection->addCurrency($currency);
        }
    }
}
}



