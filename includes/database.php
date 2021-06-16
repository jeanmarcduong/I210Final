<?php
/**
 * Author: Jeanmarc Duong
 * Date: 11/22/2019
 * File: database.php
 * Description:
 */


// define settings
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "inventory";

//connect to mysql server
$conn = @new mysqli($host, $login, $password, $database);


//If connection to the database fails, it displays a message
if ($conn -> connect_errno) {
    $errno = $conn -> connect_errno;
    $error = $conn -> connect_error;

    exit("Connection to database failed: ($errno) $error");
}