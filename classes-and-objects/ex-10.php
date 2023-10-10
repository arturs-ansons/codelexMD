<?php declare(strict_types=1);

class Application
{

    private array $movies;

    public function __construct()
    {
        $this->movies = [];
    }

    public function run()
    {
        $videoStore = new VideoStore();

        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    echo "Enter title: ";
                    $title = readline();
                    echo "Enter rating: ";
                    $rating = readline();
                    $videoStore->add_movies($title, $rating);
                    break;
                case 2:
                    echo "Enter title to rent: ";
                    $title = readline();
                    $videoStore->rent_video($title); // Call rent_video on $videoStore
                    break;
                case 3:
                    echo "Enter title to return: ";
                    $title = readline();
                    $videoStore->return_video($title); // Call return_video on $videoStore
                    break;
                case 4:
                    $videoStore->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }
}
class VideoStore
{
    private array $movies = [];

    public function add_movies($title, $rating)
    {
        $this->movies[] = new Video($title, $rating);
    }

    public function rent_video($title): void
    {
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
                echo "Sorry, '{$title}' not found in the inventory.\n";
            }
        }

    }

    public function return_video($title):void
    {
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
                echo "Sorry, '{$title}' not found in the inventory.\n";
            }
        }

    }

    public function list_inventory():void
    {
        /** @var Video $movie
         */
        foreach ($this->movies as $movie) {
            $status = $movie->isRented() ? "Rented" : "Available";
            echo "Title: {$movie->getTitle()}, Rating: {$movie->getRating()}, Status: $status\n";
        }
    }
}


class Video
{
    private string $title;
    private bool $isRented;
    private string $rating;

    public function __construct($title, $rating)
    {
        $this->title = $title;
        $this->isRented = false;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isRented(): bool
    {
        return $this->isRented;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public function rent()
    {
        $this->isRented = true;
    }

    public function returnVideo()
    {
        $this->isRented = false;
    }
}

$app = new Application();
$app->run();