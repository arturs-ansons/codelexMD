<?php

class Movie {
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating) {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStudio(): string
    {
        return $this->studio;
    }

    public function getRating(): string
    {
        return $this->rating;
    }

    public static function GetPG($movies) {
        $pgMovies = [];
        foreach ($movies as $movie) {
            if ($movie->getRating() === "PG") {
                $pgMovies[] = $movie;
            }
        }
        return $pgMovies;
    }
}


$casinoR = new Movie("Casino Royal", "Eon Productions", "PG13");
$glass = new Movie("Glass", "Buena Vista International", "PG13");
$spider = new Movie("Spider-Man", "Columbia Picture", "PG");

$movies = [$casinoR, $glass, $spider];

$pgMovies = Movie::GetPG($movies);

foreach ($pgMovies as $movie) {
    /** @var Movie $movie
     */
    echo "Title: " . $movie->getTitle() . ", Studio: " . $movie->getStudio() . ", Rating: " . $movie->getRating() . "\n";
}

