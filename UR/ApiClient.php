<?php

class ApiClient {
    private string $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    function getData() {
        $json = file_get_contents($this->apiUrl);

        $data = json_decode($json);

        if ($data && isset($data->result->records) && is_array($data->result->records)) {
            foreach ($data->result->records as $rec) {
                echo "Name: " . $rec->name . "\n";
                echo "Address: " . $rec->address . "\n";
                echo "Index: " . $rec->index . "\n\n";
            }
        } else {
            echo "Failed to fetch data from the API or data structure is incorrect.";
        }
    }



}
