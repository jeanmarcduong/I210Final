<?php
/** Author: Jeanmarc Duong
 *  Date: 11/25/19
 *  Description: Displays the inventory of the site
 */
$page_title = "Shop Page";
require_once ('includes/header.php');
require_once('includes/database.php');


//SELECT statement
$sql = "SELECT * FROM products JOIN manufacturers ON products.manufacturer_id = manufacturers.manufacturer_id";

//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $errno = $conn->errno;
    $error = $conn->error;
    $conn->close();
    require 'includes/footer.php';
    die("Selection failed: ($errno) $error.");
}
?>

    <h1>Shop Page</h1>
    <div class="productlist">
        <div class="row header">
            <div class="col1">Product Name</div>
            <div class="col2">Quantity in stock</div>
            <div class="col3">Manufacturer</div>
            <div class="col4">Price</div>
            <div class="col5">Origin</div>
        </div>
        <!-- PHP code that displays the data from the database -->
<?php

//ADVANCED FEATURE PAGINATION
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 5;
$offset = ($pageno - 1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT * FROM products";
$result = @$conn->query($total_pages_sql);
$total_rows = $result;
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM products JOIN manufacturers ON products.manufacturer_id = manufacturers.manufacturer_id LIMIT $offset, $no_of_records_per_page";
$res_data = @$conn->query($sql);

while ($row = $res_data->fetch_array()) {
    echo "<div class='row'>";
    echo "<div class='col1'><a href='productdetail.php?id=", $row['id'], "'>", $row['name'], "</a></div>";
    echo "<div class='col2'>", $row['quantity'], "</div>";
    echo "<div class='col3'>", $row['mname'], "</div>";
    echo "<div class='col4'>", $row['price'], "</div>";
    echo "<div class='col5'>", $row['state'], "</div>";
    echo "</div>";
}
$conn->close();




?>
    </div>

        <p>
            <a href="<?php echo "?pageno=".($pageno - 1); ?>">Prev</a>
        </p>

        <p>
            <a href="<?php echo "?pageno=".($pageno + 1); ?>">Next</a>
        </p>


<?php
require_once ('includes/footer.php');