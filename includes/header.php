
<?php
/**
 * Author: Jeanmarc Duong
 * Date: 11/22/2019
 * File: test.php
 * Description:
 */

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$count = 0; //total number of items

//retrieve shopping cart content
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];

    if($cart) {
        $count = array_sum($cart);
    }
}

//set shopping cart image
$shoppingcart_img =(!$count ? "empty_cart.png" : "full_cart.png");

//variables for user's login, name, role
$login = $name = $role = '';

if(isset($_SESSION['login'])
    AND isset ($_SESSION['name'])
    AND isset ($_SESSION['role'])
) {
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ?></title>
    <link type="text/css" rel="stylesheet" href="css/storestyle.css" />
</head>
<body>

<a href="index.php">
    <img src="images/logo done.png" class="office" alt="logo" height="200" width="275">
    <!-- Slogan here: Business taken care of -->
    <!-- Search up how to do multiple fields and concatenating them -->

</a>
<div class="shoppingcart">
    <a href="showcart.php">
        <img src='images/<?= $shoppingcart_img ?>' alt='Shopping cart' style='width: 50px; border: none'><br><?= $count ?> item(s)
    </a>
</div>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="shop.php">Shop</a>
    <a href="aboutus.php">About Us</a>
    <a href="companysearch.php">Specific Search</a>
    <?php
    if($role == 1) {
        echo "<a href= 'newproduct.php'>Add Product </a>";
    }
    if(empty($login)){
        echo "<a href='loginform.php'>Login</a>";
    } else{
        echo "<a href='logout.php'>Logout</a>";
        echo "<a style=' color:white; padding-bottom: 14px'>Welcome, $name</a>";
    }
    ?>
    <div class="search-container">
        <form action="searchresults.php" method="get">
            <input type="text" name="terms" size="25" required />&nbsp;&nbsp;
            <input type="submit" name="Submit" id="Submit" value="Search" />
        </form>
    </div>
</div>


<div id="mainbody">