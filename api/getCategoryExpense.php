<?php

include('../includes/db_connect.php');

$query = "SELECT categories.name AS categoryName,SUM(expenses.amount) AS totalExpense FROM expenses 
INNER JOIN categories ON expenses.categoryId = categories.id 
GROUP BY categoryName ORDER BY expenses.id DESC";
$categoryExpense = mysqli_query($connection, $query);
$numRows = mysqli_num_rows($categoryExpense);

if ($numRows > 0) {
    // Initialize an empty array to hold the data
    $data = [];
    // Fetch associative array from the result set
    while ($row = mysqli_fetch_array($categoryExpense)) {
        // Add each row to the data array
        array_push($data, $row);
    }
    // Convert data array to JSON format
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    // echo '<pre>', var_dump($json_data), '</pre>';

    header('Content-Type:application/json');
    echo $json_data;
} else {
    echo "Couldn't Load Data";
}
// $row = mysqli_fetch_assoc($categoryExpense);
// var_dump($row);
// var_dump($categoryExpense);
