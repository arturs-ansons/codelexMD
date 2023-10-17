<?php

require_once('Company.php');


class CompanyCollection
{
    private array $companies = [];

    public function __construct()
    {
        $this->addCompany();
    }
    /**
     * Add a company to the collection.
     *
     * @param Company $company
     */
    public function addCompany(Company $company)
    {
        $this->companies[] = $company;
    }

}