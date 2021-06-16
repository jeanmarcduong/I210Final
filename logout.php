<?php
/**
 * Author: "Cody Hough"
 * Date: 12/11/19
 * File: logout.php
 * Description: Logs user out
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = array();
setcookie(session_name(), '', time()-10);
session_destroy();

$page_title  = "PHP Online Bookstore Logout";
include 'includes/header.php';
?>
    <h2>Logout</h2>
    <p>Thank you for your visit. You are now logged out.</p>
<?php
include 'includes/footer.php';
