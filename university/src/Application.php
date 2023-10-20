<?php
namespace University;


class Application
{
    public function run(): void
    {
        // Initialize your UniversityCollection and ApiDataProcessor
        $universityCollection = new UniversityCollection();
        $apiDataRetriever = new ApiDataRetriever();
        $apiDataProcessor = new ApiDataProcessor($universityCollection);

           $apiUrl = 'https://api.nationalize.io/?name=arturs';

            // Retrieve the API data
            $apiData = $apiDataRetriever->retrieveApiData($apiUrl);

            // Process the API data
            $apiDataProcessor->processApiData($apiData);

            // Get the populated universities
            $universities = $universityCollection->getUniversities();

            $searchCountry = readline("Enter a country to search for universities: ");

            $filteredUniversities = $this->filterUniversitiesByCountry($universities, $searchCountry);

                foreach ($filteredUniversities as $university) {
                    /** @var University $university */
                    echo "Country: " . $university->getCountry() . "\n";
                    echo "Name: " . $university->getName() . "\n";
                    echo "Domains: " . implode(', ', $university->getDomains()) . "\n";
                    echo "Web Pages: " . implode(', ', $university->getWebPages()) . "\n";
                    echo "Alpha Two Code: " . $university->getAlphaTwoCode() . "\n";
                    echo "State/Province: " . $university->getStateProvince() . "\n";
                    echo "------------------------\n";
                }
        if (empty($filteredUniversities)) {
            echo "No universities found in the country: $searchCountry\n";
        }
            }

            private function filterUniversitiesByCountry(array $universities, string $country): array
    {
        $filteredUniversities = [];
        foreach ($universities as $university) {
            /** @var University $university */
            if ($university->getCountry() === $country) {
                $filteredUniversities[] = $university;
            }
        }
        return $filteredUniversities;
    }
}
