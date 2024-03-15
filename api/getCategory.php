<?php

include(__DIR__ . '/../includes/db_connect.php');

// Fetch data from the database table
$sql = "SELECT * FROM categories ORDER BY id DESC ";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Initialize an empty array to hold the data
    $data = array();

    // Fetch associative array from the result set
    while ($row = $result->fetch_assoc()) {
        // Add each row to the data array

        $data[] = $row;
    }

    // echo '<pre>', var_dump($data), '</pre>';

    // Convert data array to JSON format
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    // echo '<pre>', var_dump($json_data), '</pre>';

    // Output JSON data
    header('Content-Type: application/json');
    echo $json_data;
} else {
    echo "No records found";
}
