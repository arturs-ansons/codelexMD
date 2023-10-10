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

    public function incrementFuel(int $amount): void {

        $this->currentFuel += $amount;

    }

    public function decrementFuel(int $amount): void {

            $this->currentFuel -= $amount;
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

    public function incrementMileage(): void
    {

        $this->currentMileage += 10;

        if ($this->currentMileage > 999) {
            $this->currentMileage = 0;
        }

    }
    public function drive(FuelGauge $fuelGauge): void {

        $this->incrementMileage();

        $fuelGauge->decrementFuel(1);

    }
}

class Simulation {

    public function simulateRide():void {

        $fuelGauge = new FuelGauge();
        $odometer = new Odometer();

        while ($fuelGauge->getCurrentFuel() >= 1) {
            $odometer->drive($fuelGauge);
            echo "Distance: " . $odometer->getCurrentMileage() . " km, Fuel: " . $fuelGauge->getCurrentFuel() . " liters\n";

            if ($fuelGauge->getCurrentFuel() == 0) {
                $fuelGauge->incrementFuel(70);
                echo "Fuel after adding more: " . $fuelGauge->getCurrentFuel() . " liters\n";
            }

            if ($odometer->getCurrentMileage() === 0) {
                break;
            }
        }

        echo "You have exceeded your Odo, buy a new car!";
    }
}

$simulation = new Simulation();
$simulation->simulateRide();

