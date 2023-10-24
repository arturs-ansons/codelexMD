<?php

namespace rikcy;

class VideoStore
{
    private array $movies;
    private string $inventoryFile;

    public function __construct()
    {
        $this->movies = [];
        $this->inventoryFile = __DIR__ . DIRECTORY_SEPARATOR . 'inventory.json';
    }

    public function loadInventory(): void
    {
        if (file_exists($this->inventoryFile)) {
            $json = file_get_contents($this->inventoryFile);
            $data = json_decode($json, true);

            if ($data) {
                $this->movies = [];

                foreach ($data['video'] as $video) {
                    $title = $video['title'];
                    $isRented = $video['isRented'];
                    $name = $video['name'];
                    $rating = $video['rating'];
                    $this->movies[] = new Video($title, $isRented, $name, $rating);
                    print_r($this->movies);
                }

                echo "Inventory loaded from JSON file.\n";
                $this->list_inventory();
            } else {
                echo "Failed to load inventory from the JSON file.\n";
            }
        } else {
            echo "Inventory file not found. Starting with an empty inventory.\n";
        }
    }

    public function saveInventory(): void
    {
        if (empty($this->movies)) {
            echo "Inventory is empty. Nothing to save.\n";
        } else {
            $data = ['video' => []];

            foreach ($this->movies as $movie) {
                $data['video'][] = [
                    'title' => $movie->getTitle(),
                    'isRented' => $movie->isRented(),
                    'name' => $movie->getName(),
                    'rating' => $movie->getRating(),
                ];
            }

            $json = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($this->inventoryFile, $json);
            echo "Inventory saved to JSON file.\n";
        }
    }

    public function get_movies(): void
    {
        $json = file_get_contents("https://rickandmortyapi.com/api/episode");
        $data = json_decode($json);

        if ($data && isset($data->results)) {
            foreach ($data->results as $episode) {
                $title = $episode->episode;
                $isRented = property_exists($episode, 'rented') ? $episode->rented : 'false';
                $name = $episode->name;
                $rating = property_exists($episode, 'rating') ? $episode->rating : 0;

                $this->movies[] = new Video(
                    $title,
                    $isRented,
                    $name,
                    $rating
                );
            }
        } else {
            echo "Failed to fetch data from the API.\n";
        }
    }

    public function rent_video($title): void
    {
        $movieFound = false;
        /** @var Video $movie
         */
        foreach ($this->movies as $movie) {
            if ($movie->getTitle() === $title) {
                if (!$movie->isRented()) {
                    $movie->rent();
                    echo "You rented '{$movie->getTitle()}' successfully.\n";
                } else {
                    echo "Sorry, '{$movie->getTitle()}' is already rented.\n";
                }
                $movieFound = true;
                break;
            }
        }

        if (!$movieFound) {
            echo "Sorry, '{$title}' not found in the inventory.\n";
        }
    }

    public function return_video($title): void
    {
        $movieFound = false;
        /** @var Video $movie
         */
        foreach ($this->movies as $movie) {

            if ($movie->getTitle() === $title) {
                if ($movie->isRented()) {
                    $movie->returnVideo();
                    echo "You returned '{$movie->getTitle()}' successfully.\n";
                } else {
                    echo "Sorry, '{$movie->getTitle()}' was not rented.\n";
                }
                $movieFound = true;
                break;
            }
        }

        if (!$movieFound) {
            echo "Sorry, '{$title}' not found in the inventory.\n";
        }
    }

    public function list_inventory(): void
    {
        if (empty($this->movies)) {
            echo "Inventory is empty.\n";
        } else {
            /** @var Video $movie
             */
            foreach ($this->movies as $movie) {
                $status = $movie->isRented() ? "Rented" : "Available";
                echo "Episode: {$movie->getTitle()}, Name: {$movie->getName()}, Rating: {$movie->getRating()} Status: $status\n";

            }
        }
    }


    public function rateTheMovie($title, $rate): void
    {
        /** @var Video $movie
         */
        foreach ($this->movies as $movie) {
            if ($movie->getTitle() === $title) {
                $movie->setRating($rate);
                echo "You rated '{$movie->getTitle()}' with $rate stars.\n";
            }
        }
    }
}
