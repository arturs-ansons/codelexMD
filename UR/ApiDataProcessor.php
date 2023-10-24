<?php

class ApiDataProcessor {
    private CompanyCollection $companyCollection;

    public function __construct(CompanyCollection $companyCollection) {
        $this->companyCollection = $companyCollection;

    }

    public function processApiData($apiUrl) {
        $json = file_get_contents($apiUrl);
        $data = json_decode($json);

        if ($data && isset($data->result->records) && is_array($data->result->records)) {
            foreach ($data->result->records as $rec) {
                $company = new Company($rec->name, $rec->address, $rec->index);
                $this->companyCollection->addCompany($company);
            }
        }
    }
}
