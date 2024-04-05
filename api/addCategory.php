<?php
include(__DIR__ . '/../includes/db_connect.php');

if (isset($_POST['category'])) {

    if (!empty($_POST['category'])) {

        $category = mysqli_real_escape_string($connection, $_POST['category']);
        // echo $category;
        $query = "INSERT INTO categories (name) VALUES ('$category')";
        $new_category = mysqli_query($connection, $query);
        // echo $query;

        //' does not work when ussing in ajax jquery'
        // redirect('../categories.php');
    }
}
