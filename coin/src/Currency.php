<?php
namespace Coin;
use Carbon\Carbon;
class Currency {

    private string $code;
    private string $symbol;
    private string $rate;
    private string $description;
    private float $rateFloat;

    public function __construct(string $code, string $symbol, string $rate, string $description, float $rateFloat) {
        $this->code = $code;
        $this->symbol = $symbol;
        $this->rate = $rate;
        $this->description = $description;
        $this->rateFloat = $rateFloat;
    }
    function getCurrentDateTime() {
        return Carbon::now();
    }
    public function getCode(): string {
        return $this->code;
    }

    public function getSymbol(): string {
        return $this->symbol;
    }

    public function getRate(): string {
        return $this->rate;
    }

    public function getDescription():string {
        return $this->description;
    }

}
