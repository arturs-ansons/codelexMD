<?php

require_once('Company.php');


class CompanyCollection
{
    private array $companies = [];

    public function __construct()
    {
        foreach ($this->companies as $company){

            $this->addCompany($company);
        }
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

    /**
     * Get all the companies in the collection.
     *
     * @return array
     */
    public function getCompanies(): array
    {
        return $this->companies;
    }
}