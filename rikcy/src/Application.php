<?php

namespace rikcy;

class Application
{
    public function run()
    {
        $videoStore = new VideoStore();
        $videoStore->get_movies();
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
