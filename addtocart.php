<?php
/**
 * Author: "Cody Hough"
 * Date: ${Date}
 * File: addtocart.php
 * Description: Code to add to the cart
 */

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
}  else{
    $cart = array();
}

//retrieve the item id from a querystring variable
$id = '';
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

if(!$id){
    $error = "Invalid id detected.";
    header("Location: error.php?m=$error");
    exit;
}

//does the item id already exist in the cart
if(array_key_exists($id, $cart)) { //an existing item
    $cart[$id] = $cart[$id] + 1; //increase quantity by 1
} else{   //a new item
    $cart[$id] = 1;
}
//store the cart in session
$_SESSION['cart'] = $cart;

//var_dump ($cart);
//print_r($cart);
header("Location:showcart.php");


?>