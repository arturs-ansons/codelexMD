<?php

class GetApi
{
    public function convert(string $coinFrom): ?array
    {
        $curl = curl_init();

        $apiUrl = "https://api4.binance.com/api/v3/ticker/24hr?symbol={$coinFrom}BTC";


        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
        ));

        $response = curl_exec($curl);
        $data = json_decode($response, true);

        curl_close($curl);

        if (isset($data['lastPrice'])) {
            return [
                'symbol' => $data['symbol'],
                'lastPrice' => $data['lastPrice'],
            ];
        } else {
            return null;
        }
    }
}
