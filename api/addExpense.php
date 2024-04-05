<?php
include('../includes/db_connect.php');
if (isset($_POST['categoryId'])) {
    $categoryId = mysqli_real_escape_string($connection, $_POST['categoryId']);
    $expenseName = mysqli_real_escape_string($connection, $_POST['expenseName']);
    $expenseAmount = mysqli_real_escape_string($connection, $_POST['expenseAmount']);

    // echo $categoryId;

    $query = "INSERT INTO expenses (name,amount,categoryId) VALUES ('$expenseName','$expenseAmount',$categoryId)";
    $new_expense = mysqli_query($connection, $query);
    // echo $query;
}
