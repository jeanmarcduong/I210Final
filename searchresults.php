<?php
/** Author: Jeanmarc Duong
 *  Date: 11/20/2019
 *  Description: Displays products based on matching terms
 */

$page_title = "Search Product Results";
require_once ('includes/header.php');
require_once('includes/database.php');

//Filter the variable name
$term_string = filter_input(INPUT_GET, "terms", FILTER_SANITIZE_STRING);

//Split the string
$terms = explode(" ", $term_string);

//SQL statement to select products where the terms match up with the database
$sql = "SELECT * FROM products JOIN manufacturers ON products.manufacturer_id = manufacturers.manufacturer_id WHERE ";

foreach ($terms as $term) {

    $sql .= "name LIKE '%$term%' AND ";

}

//Takes out the extra AND at the end of the sql statement
$sql = rtrim($sql, "AND ");

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
    <h1>Search Results</h1>
    <!--Header that echos the terms -->
    <h2>Products: <?php echo $term_string ?></h2>


<?php
//check the number of rows in the returned value; 0 indicates that the terms were not found in the database.
$num_rows = $query->num_rows;

if (!$num_rows) {
    echo "Your search \"<i>$term_string</i>\" did not match any of the products that we currently have";
    $conn->close();
    require_once "includes/footer.php";
    exit;
}
?>

    <div class="productlist">
        <div class="row header">
            <div class="col1">Product Name</div>
            <div class="col2">Quantity in stock</div>
            <div class="col3">Manufacturer</div>
            <div class="col4">Price</div>
        </div>
        <!-- PHP code that lists products-->
        <?php
        while ($row = $query->fetch_assoc()) {
            echo "<div class='row'>";
            echo "<div class='col1'><a href='productdetail.php?id=", $row['id'], "'>", $row['name'], "</a></div>";
            echo "<div class='col2'>", $row['quantity'], "</div>";
            echo "<div class='col3'>", $row['mname'], "</div>";
            echo "<div class='col4'>", $row['price'], "</div>";
            echo "</div>";
        }
        ?>
    </div>
<?php
require 'includes/footer.php';
