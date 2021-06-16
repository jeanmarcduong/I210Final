<?php

/** Author: Jeanmarc Duong
 *  Date: 12/9/19
 *  Description: This PHP script retrieves id from a query string variable.
 *  It then deletes a record from the products table in the database.
 */

$page_title = "Delete a product";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a querystring
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Error: user id was not found.";
    require_once ('includes/footer.php');
    exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the MySQL delete statement
$sql = "DELETE FROM products WHERE id = $id";

//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Deletion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "The product has been deleted.";
// close the connection.
$conn->close();

include ('includes/footer.php');