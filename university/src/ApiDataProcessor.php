<?php

namespace University;
class ApiDataProcessor
{
    private UniversityCollection $universityCollection;

    public function __construct(UniversityCollection $universityCollection)
    {
        $this->universityCollection = $universityCollection;
    }

    public function processApiData(string $apiData): void
    {
        $data = json_decode($apiData);

        if (is_array($data)) {
            foreach ($data as $universityData) {
                $name = $universityData->name ?? 'Name Not Available';
                $country = $universityData->country ?? 'Country Not Available';
                $domains = $universityData->domains ?? [];
                $webPages = $universityData->web_pages ?? [];
                $alphaTwoCode = $universityData->alpha_two_code ?? 'Alpha Two Code Not Available';
                $stateProvince = $universityData->state_province ?? 'State/Province Not Available';

                $university = new University($country, $name, $domains, $webPages, $alphaTwoCode, $stateProvince);
                $this->universityCollection->addUniversity($university);
            }
        }
    }
}


