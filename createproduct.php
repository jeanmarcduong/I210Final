<?php
/** Author: Jeanmarc Duong
 *  Date: 11/25/19
 *  Description: This PHP script retrieves data from a form, and then
 *  inserts the data into the products table in the inventory database.
 */

$page_title = "Create a new user";

require_once 'includes/header.php';
require_once 'includes/database.php';

//retrieve, sanitize, and escape user's input from a form
$name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'price', FILTER_SANITIZE_STRING)));
$quantity = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'quantity', FILTER_SANITIZE_STRING)));
$manufacturer = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'manufacturer', FILTER_DEFAULT)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));

//define the MySQL insert statement
$sql = "INSERT INTO products 
        VALUES (NULL, '$name', '$price', '$quantity', '$manufacturer','$image','$description')";



//execute the query
$query = $conn->query($sql);



//handle error
if(!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}

echo "The new products has been created.";
$conn->close();

include 'includes/footer.php';