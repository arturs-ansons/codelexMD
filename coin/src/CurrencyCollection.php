<?php
namespace coin;
class CurrencyCollection
{
    private array $currencies = [];

    public function __construct()
    {
        foreach ($this->currencies as $currency){

            $this->addCurrencies($currency);
        }
    }

    /**
     * Add a company to the collection.
     *
     * @param Currency $currency
     */
    public function addCurrency(Currency $currency): void
    {
        $this->currencies[] = $currency;
    }

    /**
     * Get all the companies in the collection.
     *
     * @return array
     */
    public function getCurrencies(): array
    {
        return $this->currencies;
    }
}
