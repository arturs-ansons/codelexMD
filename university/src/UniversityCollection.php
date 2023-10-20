<?php

namespace University;

class UniversityCollection
{
    private array $universities = [];

    public function addUniversity(University $university): void
    {
        $this->universities[] = $university;
    }

    public function getUniversities(): array
    {
        return $this->universities;
    }
}
