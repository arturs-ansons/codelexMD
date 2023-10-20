<?php
namespace University;
class University {
    private string $stateProvince;
    private string $country;
    private array $domains;
    private array $webPages;
    private string $alphaTwoCode;
    private string $name;

    public function __construct(string $stateProvince, string $country, array $domains, array $webPages, string $alphaTwoCode, string $name) {
        $this->stateProvince = $stateProvince;
        $this->country = $country;
        $this->domains = $domains;
        $this->webPages = $webPages;
        $this->alphaTwoCode = $alphaTwoCode;
        $this->name = $name;
    }

    public function getStateProvince(): string {
        return $this->stateProvince;
    }

    public function getCountry(): string {
        return $this->country;
    }

    public function getDomains(): array {
        return $this->domains;
    }

    public function getWebPages(): array {
        return $this->webPages;
    }

    public function getAlphaTwoCode(): string {
        return $this->alphaTwoCode;
    }

    public function getName(): string {
        return $this->name;
    }
}
