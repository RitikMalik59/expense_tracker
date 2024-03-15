<?php

include('../includes/db_connect.php');

if (isset($_POST['id'])) {
    # code...
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    echo $id;

    $query = "DELETE FROM categories Where id=$id";
    // $delete_task = mysqli_query($connection, $query);
    $delete_category = mysqli_query($connection, $query);
    // echo $query;

    // redirect('index.php');
}
