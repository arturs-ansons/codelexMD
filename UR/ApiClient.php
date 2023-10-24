<?php
require_once('ApiDataProcessor.php');

class ApiClient {
    private string $apiUrl;
    private ApiDataProcessor $apiDataProcessor;
    private CompanyCollection $companyCollection;

    public function __construct($apiUrl, ApiDataProcessor $apiDataProcessor, CompanyCollection $companyCollection) {
        $this->apiUrl = $apiUrl;
        $this->apiDataProcessor = $apiDataProcessor;
        $this->companyCollection = $companyCollection;
    }

    function getData() {
        $this->apiDataProcessor->processApiData($this->apiUrl);

        foreach ($this->companyCollection->getCompanies() as $company) {
            echo "Company Name: " . $company->getName() . "\n";
            echo "Company Address: " . $company->getAddress() . "\n";
            echo "Company Index: " . $company->getIndex() . "\n\n";
        }
    }
}






