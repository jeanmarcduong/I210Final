<?php
/** Author: Jeanmarc
 *  Date: 11/25/19
 *  Description: Details the products
 */
$page_title = "Product Detail";
require_once('includes/header.php');
require_once('includes/database.php');

//if product id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, "id")) {
    $conn->close();
    require_once('includes/footer.php');
    die("The request could not be processed due to an issue with the product id.");
}

//get the product id from a query string variable.
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


//SELECT statement
$sql = "SELECT * FROM products JOIN manufacturers ON products.manufacturer_id = manufacturers.manufacturer_id WHERE id=$id";

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

//If there are no rows found, the program will close connection to the database
if (!$row = $query->fetch_assoc()) {
    $conn->close();
    echo("Product not found.");
    require 'includes/footer.php';
    die();
}
?>


    <h1>Product Details</h1>

<!-- Table displays the product details -->
<div class="productdetail">
        <table>
            <tr>
            <th>Name:</th>
            <td style='text-align: left'><?php echo $row['name'] ?></td>
            </tr>

            <tr>
                <th></th>
                <td</td>
            </tr>


            <tr>
            <th>Price:</th>
            <td style='text-align: left'><?php echo $row['price'] ?></td>
            </tr>

            <tr>
                <th></th>
                <td</td>
            </tr>

            <tr>
            <th>Description:</th>
            <td style='text-align: left'><?php echo $row['description'] ?></td>
            </tr>

        </table>

</div>
<p>
<input type="button" onclick="window.location.href='addtocart.php?id=<?= $id ?>'"
       value=" Add To Cart ">
</p>


<?php
if ($role == 1) {
    ?>
    <p>
    <form action="deleteproduct.php" onsubmit="return confirm('Are you sure you want to delete the product?')">

        <input type="button" onclick="window.location.href='editproduct.php?id=<?php echo $row['id'] ?>'"
               value=" Edit "> &nbsp; &nbsp;
        <input type="submit" value="Delete"> &nbsp; &nbsp;
        <input type="button" onclick="window.location.href='shop.php'"
               value=" Cancel ">

        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    </form>

    </p>


    <?php
}
require_once('includes/footer.php');