<?php

class Date{

    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year) {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    function displayDate(): string
    {

    return $this->day . "/" . $this->month . "/" . $this->year;
    }

}

$date = new Date(9,03,1984);

$dateString = $date->displayDate();

echo $dateString;