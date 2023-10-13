<?php declare(strict_types=1);

class Application
{
    public function run()
    {
        $videoStore = new VideoStore();
        //$videoStore->get_movies();
        while (true) {
            echo "Choose the operation you want to perform\n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to list inventory\n";
            echo "Choose 2 to rent video\n";
            echo "Choose 3 to return video\n";
            echo "Choose 4 to save inventory\n";
            echo "Choose 5 to rate the movie\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $videoStore->loadInventory();
                    break;
                case 2:
                    echo "Enter episode to rent: ";
                    $title = readline();
                    $videoStore->rent_video($title);
                    $videoStore->saveInventory();
                    break;
                case 3:
                    echo "Enter episode to return: ";
                    $title = readline();
                    $videoStore->return_video($title);
                    $videoStore->saveInventory();
                    break;
                case 4:
                    $videoStore->saveInventory();
                    break;
                case 5:
                    echo "Please enter the title of the movie: ";
                    $title = readline();
                    echo "Please rate the movie from 1-10: ";
                    $rate = (int)readline();
                    $videoStore->rateTheMovie($title, $rate);
                    $videoStore->saveInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you.\n";
            }
        }
    }
}

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
print_r($this->movies);
                    $this->movies[] = new Video($title, $isRented, $name, $rating);
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

$app = new Application();
$app->run();
