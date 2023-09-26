<?php
// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://rickandmortyapi.com/api/episode'); // API endpoint URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output for debugging

// Execute the GET request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Get the HTTP status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Check the HTTP status code
    if ($httpCode >= 200 && $httpCode < 300) {
        // Successful response, handle the API data
        $data = json_decode($response, true);
        if ($data) {
            // Loop through episodes and render as HTML
            if (isset($data['results']) && is_array($data['results'])) {
                foreach ($data['results'] as $episode) {
                    echo '<h2>' . $episode['name'] . '</h2>';
                    echo '<p>Air Date: ' . $episode['air_date'] . '</p>';
                    echo '<p>Episode: ' . $episode['episode'] . '</p>';
                    echo '<p>Characters:</p>';

                    // Display characters as links
                    echo '<ul>';
                    foreach ($episode['characters'] as $characterUrl) {
                        echo '<li><a href="' . $characterUrl . '">' . $characterUrl . '</a></li>';
                    }
                    echo '</ul>';

                    echo '<hr>';
                }
            } else {
                echo 'No episodes found.';
            }
        } else {
            echo 'API response is not valid JSON';
        }
    } else {
        // Handle HTTP error status code
        echo 'HTTP Error: ' . $httpCode;
    }
}

// Close cURL session
curl_close($ch);


