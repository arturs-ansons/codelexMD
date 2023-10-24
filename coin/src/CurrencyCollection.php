<?php
namespace Coin;
class CurrencyCollection
{
    private array $currencies = [];

    public function __construct()
    {
        foreach ($this->currencies as $currency){

            $this->addCurrencies($currency);
        }
    }
    public function addCurrency(Currency $currency): void
    {
        $this->currencies[] = $currency;
    }
    public function getCurrencies(): array
    {
        return $this->currencies;
    }
}
