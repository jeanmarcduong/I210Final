<?php
/**
 * Author: Jeanmarc Duong
 * Date: 12/17/2019
 * File: companysearch.php
 * Description: Page to select which manufacturer's products to find
 */
$title = "Manufacturer Search";

include ('includes/header.php');
?>

<!-- ADVANCED FEATURE: Filtering Products of Inventory -->
    <h2>Search Products by Manufacturer</h2>
    <p>Select a radio button for a manufacturer</p>
    <form action="companyresults.php" method="get">


        <input type="radio" name="company" value="1001" />HP &nbsp;&nbsp;
        <input type="radio" name="company" value="1002" />Canon &nbsp;&nbsp;
        <input type="radio" name="company" value="1003" />Xerox &nbsp;&nbsp;
        <input type="radio" name="company" value="1004" />Epson &nbsp;&nbsp;
        <input type="radio" name="company" value="1005" />Dell &nbsp;&nbsp;
        <input type="radio" name="company" value="1006" />Brother &nbsp;&nbsp;
        <input type="submit" name="Submit" id="Submit" size="40" value="Search by Manufacturer" />

    </form>
<?php
include ('includes/footer.php');