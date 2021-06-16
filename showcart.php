<?php
/**
 * Author: "Cody Hough"
 * Date:
 * File: showcart.php
 * Description: Shows the cart
 */

    $page_title = "Shopping Cart";
    require_once ('includes/header.php');
    require_once('includes/database.php');
    ?>
    <h2>My Shopping Cart</h2>
<?php
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>
    <table class="itemlist">
        <tr>
            <th style="width: 500px">Products</th>
            <th style="width: 60px">Price</th>
            <th style="width: 60px">Quantity</th>
            <th style="width: 60px">Total</th>
        </tr>
        <?php
        //insert code to display the shopping cart content
        $sql = "SELECT id, name, price FROM products WHERE 0 ";
        foreach(array_keys($cart) as $id) {
            $sql .= " OR id=$id";
        }

        $query = $conn->query($sql);

        while ($row = $query->fetch_assoc()){
            $id = $row ['id'];
            $title = $row['name'];
            $price = $row['price'];
            $qty = $cart[$id];
            $total = $qty * $price;
            echo "<tr>",
            "<td><a href='productdetail.php?id=$id'>$title</a></td>",
            "<td>$$price</td>",
            "<td>$qty</td>",
            "<td>$$total</td>",
            "</tr>";

        }
        ?>
    </table>
    <br>
    <div class="officezone-button">
        <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
        <input type="button" value="Cancel" onclick="window.location.href = 'shop.php'" />
    </div>
    <br><br>

<?php
include ('includes/footer.php');

