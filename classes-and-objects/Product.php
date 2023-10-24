<?php

class Product
{
    private string $name;
    private float $startPrice;
    private int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function getProduct(): stdClass
    {
        $productInfo = new stdClass();
        $productInfo->name = $this->name;
        $productInfo->startPrice = $this->startPrice;
        $productInfo->amount = $this->amount;

        return $productInfo;
    }

    public function changePrice(int $newAmount, float $newPrice)
    {
        $this->amount = $newAmount;
        $this->startPrice = $newPrice;
    }
}

class Main
{
    public static function main()
    {
        $product1 = new Product('Logitech mouse', 70.00, 14);
        $product2 = new Product('iPhone 5s', 999.99, 3);
        $product3 = new Product('Epson EB-U05', 440.46, 1);

        $product2->changePrice(2,1500);

        self::displayProduct($product1);
        self::displayProduct($product2);
        self::displayProduct($product3);
    }

    public static function displayProduct(Product $product)
    {
        $productInfo = $product->getProduct();
        echo $productInfo->name . ", ";
        echo $productInfo->startPrice . " EUR" .  ", ";
        echo $productInfo->amount . " units" . "\n";
    }
}

main::main();
