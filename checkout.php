<?php
/**
 * Author: "Cody Hough"
 * Date: ${Date}
 * File: checkout.php
 * Description: Checks out the cart
 */

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

//see if the user has logged in
if (!isset($_SESSION['login'])) {
    header("Location: loginform.php");
    exit();
}


//empty the shopping cart
$_SESSION['cart'] = array();

$page_title = "Office Zone Checkout";
require_once 'includes/header.php';

?>
<h2>Office Zone Checkout</h2>
<p>Thank you for shopping with us today!
    We greatly appreciate your business!</p>

<?php
require_once 'includes/footer.php';
?>
