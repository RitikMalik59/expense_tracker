<?php

include('../includes/db_connect.php');

// $query = "SELECT * FROM expenses ORDER BY id DESC";
// $query = "SELECT expenses.id, expenses.name, categories.name AS cat FROM expenses JOIN categories ON expenses.categoryId = categories.id WHERE 1 ";
// $query = "SELECT expenses.id, expenses.name, categories.name FROM expenses JOIN categories ON expenses.categoryId = categories.id WHERE expenses.name != ''";
// $query = "SELECT expenses.id, expenses.name FROM categories JOIN expenses ON categories.id = expenses.categoryId ";
// $query = "SELECT * FROM categories JOIN expenses ON categories.id = expenses.categoryId ";
$query = "SELECT expenses.*, categories.name AS categoryName FROM expenses INNER JOIN categories ON expenses.categoryId = categories.id ORDER BY expenses.id DESC";

// echo $query, '<br>';

$expenses = mysqli_query($connection, $query);
$numRow = mysqli_num_rows($expenses);
// var_dump($expenses);
// echo '<br>';
// $row = mysqli_fetch_assoc($expenses);
// var_dump($row);
// die();
// echo $numRow;
if ($numRow > 0) {
    $data = [];
    while ($row = mysqli_fetch_assoc($expenses)) {
        // var_dump($row);
        array_push($data, $row);
        // var_dump($data);
        // echo "<br>";
    }
    // echo "<br>";
    // var_dump($data);
    $JsonData = json_encode($data, JSON_PRETTY_PRINT);
    // echo '<pre>'  . var_dump($JsonData) . '</pre>';

    header('Content-Type: application/json');
    echo $JsonData;
} else {
    echo "No Records Found";
}
// var_dump($expenses);
