<?php
/** Author: Jeanmarc Duong
 *  Date: 11/25/19
 *  Description: Edits the products details
 */

$page_title = "Products Details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a query string variable
if(!filter_has_var(INPUT_GET,'id')) {
    echo "Error: id was not found.";
    require_once 'includes/footer.php';
    exit();

}
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * FROM products WHERE id=$id";

//execute the query
$query = $conn->query($sql);


//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('includes/footer.php');
    exit;
}

$row = $query->fetch_assoc();

//display results in a table
?>

<h2>Edit Product Details</h2>

<form name="editproduct" action="updateproduct.php" method="get">
    <table class="userdetails">
        <tr>
            <th>Product ID</th>
            <td><input name="id" value="<?php echo $row['id'] ?>" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><input name="name" value="<?php echo $row['name'] ?>" required /></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><input name="price" value="<?php echo $row['price'] ?>" required /></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><input name="description" value="<?php echo $row['description'] ?>" required /></td>
        </tr>

    </table>
    <br>
    <input type="submit" value="Update"> &nbsp; &nbsp;

    <input type="button" onclick="window.location.href='productdetail.php?id=<?php echo $row['id'] ?>'"
           value=" Cancel "> &nbsp; &nbsp;

</form>
<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');
?>
