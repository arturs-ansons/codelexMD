<?php

class FuelGauge {

    private int $currentFuel;

    public function __construct() {
        $this->currentFuel = 70;
    }

    public function getCurrentFuel(): int
    {
        return $this->currentFuel;
    }

    public function incrementFuel($amount) {

        if ($this->currentFuel + $amount) {
            $this->currentFuel += $amount;
        } else {
            $this->currentFuel = 70; // Limit fuel to the maximum capacity (70 liters)
        }
    }

    public function decrementFuel($amount) {

        if ($this->currentFuel >= $amount) {
            $this->currentFuel -= $amount;
        } else {
            $this->currentFuel = 0;
        }
    }
}

class Odometer {

    private int $currentMileage;

    public function __construct() {
        $this->currentMileage = 0;
    }

    public function getCurrentMileage(): int
    {
        return $this->currentMileage;
    }

    public function incrementMileage() {

        $this->currentMileage+= 10;

        if ($this->currentMileage > 999999) {
            $this->currentMileage = 0; // Reset when mileage exceeds 999,999
        }
    }

    public function drive(FuelGauge $fuelGauge) {
        if ($fuelGauge->getCurrentFuel()) {

            $this->incrementMileage();
            $fuelGauge->decrementFuel(1); // Decrease fuel by 1 liter for every 10 kilometers
        } else {
            echo "Out of fuel!\n";
        }
    }
}

$fuelGauge = new FuelGauge();
$odometer = new Odometer();

while ($fuelGauge->getCurrentFuel() >= 1) {

    $odometer->drive($fuelGauge);
    echo "Distance: " . $odometer->getCurrentMileage() . " km, Fuel: " . $fuelGauge->getCurrentFuel() . " liters\n";

}
$fuelGauge->incrementFuel(70);
echo "Fuel after adding more: " . $fuelGauge->getCurrentFuel() . " liters\n";
