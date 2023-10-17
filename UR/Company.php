<?php

class Company
{

    private string $name;
    private string $address;
    private string $index;


    public function __construct(string $name, string $address, string $index)
    {
        $this->name = $name;
        $this->address = $address;
        $this->index = $index;


    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }


}