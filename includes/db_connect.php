<?php

$connection = mysqli_connect('localhost', 'root', '', 'expense_tracker');

if (!$connection) {
    die("Connection Failed : " . mysqli_connect_error($connection));
}

function redirect($url)
{
    header('location: ' . $url);
    die();
}

function checkQuery($result)
{
    if (!$result) {
        die("Connection Failed : " . mysqli_connect_error($result));
        // mysqli_error();
    }
}
