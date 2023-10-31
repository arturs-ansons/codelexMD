<?php

namespace MvcApp\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;

class ApiService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchAllEpisodes()
    {
        $response = $this->client->get('https://rickandmortyapi.com/api/episode');

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $episodes = $data['results'];

            foreach ($episodes as &$episode) {
                $episode['air_date'] = Carbon::parse($episode['air_date'])->format('Y-m-d');
            }

            return $episodes;
        }
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchEpisode($episodeNumber)
    {
        $response = $this->client->get('https://rickandmortyapi.com/api/episode/' . $episodeNumber);

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            if (!empty($data)) {

                if (isset($data['air_date'])) {
                    $data['air_date'] = Carbon::parse($data['air_date'])->format('Y-m-d');
                }
                return $data;
            }
        }
    }
}
