<?php

include "../includes/db_connect.php";
if (isset($_POST['e_id'])) {

    $id = mysqli_real_escape_string($connection, $_POST['e_id']);
    $editCategory = mysqli_real_escape_string($connection, $_POST['editCategory']);
    // echo $id, $editCategory;

    $query = "UPDATE categories SET name = '$editCategory' WHERE id = $id";
    $updateCategory = mysqli_query($connection, $query);
    // echo $query;
}
