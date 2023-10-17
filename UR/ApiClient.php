<?php

class ApiClient {
    private string $apiUrl;
    private CompanyCollection $companyCollection;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }
    function getData() {
        $json = file_get_contents($this->apiUrl);

        $data = json_decode($json);

        if ($data && isset($data->result->records) && is_array($data->result->records)) {
            foreach ($data->result->records as $rec) {
                if ($rec instanceof Company) {
                    $this->companyCollection->addCompany($rec);

                    echo "Name: " . $rec->getName() . "\n";
                    echo "Address: " . $rec->getAddress() . "\n";
                    echo "Index: " . $rec->getIndex() . "\n\n";
                } else {
                    echo "Data structure does not match the Company class.\n";
                }
            }
        } else {
            echo "Failed to fetch data from the API or data structure is incorrect.";
        }
    }

}




