<?php
namespace rikcy;

class Video
{
    private string $title;
    private bool $isRented;
    private string $name;
    private array $rating;

    public function __construct($title, $isRented, $name, $rating)
    {
        $this->title = $title;
        $this->isRented = ($isRented == "true");
        $this->name = $name;
        $this->rating = (array)$rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isRented(): bool
    {
        return $this->isRented;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function rent(): void
    {
        $this->isRented = true;
    }

    public function returnVideo(): void
    {
        $this->isRented = false;
    }

    public function setRating($rating): void
    {
        $this->rating[$this->title][] = $rating;
    }

    public function getRating(): float
    {
        if (isset($this->rating[$this->title])) {
            $sum = array_sum($this->rating[$this->title]);
            $count = count($this->rating[$this->title]);

            if ($count === 0) {
                return 0; // Avoid division by zero if there are no ratings.
            }
            $average = $sum / $count;
            return $average;

        } else {
            return 0; // Default rating if title is not found.
        }
    }
}
