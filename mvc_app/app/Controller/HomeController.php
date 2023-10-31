<?php

namespace MvcApp\Controller;
use Twig\Environment;

class HomeController
{
    private Environment $twig;
    private ApiService $apiService;

    public function __construct(Environment $twig, ApiService $apiService)
    {
        $this->twig = $twig;
        $this->apiService = $apiService;
    }
    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function index()
    {
        $episodes = $this->apiService->fetchAllEpisodes();
        if ($episodes !== null) {
            echo $this->twig->render('index.twig', ['episodes' => $episodes]);
        }
    }
}
