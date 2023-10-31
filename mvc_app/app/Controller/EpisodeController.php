<?php

namespace MvcApp\Controller;
use Twig\Environment;

class EpisodeController
{
    private Environment $twig;
    private ApiService $apiService;

    public function __construct(Environment $twig, ApiService $apiService)
    {
        $this->twig = $twig;
        $this->apiService = $apiService;
    }

    /**
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\LoaderError
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index(array $params)
    {
        $episodeNumber = $params['episodeUser'];

        $episode = $this->apiService->fetchEpisode($episodeNumber);
        if ($episode !== null) {
            echo $this->twig->render('index.twig', ['episode' => $episode]);
        } else {
            echo 'Failed to retrieve data from the API.';
        }
    }
}


