<?php
/**
 * Author: Jeanmarc Duong
 * Date: 11/25/19
 * File: logout.php
 * Description: Creates the product
 */


$page_title = "Create new product";

include ('includes/header.php');
?>
    <h2>Create a new product</h2>

    <form action="createproduct.php" method="get" enctype="text/plain">
        <table style='margin-left:auto;margin-right:auto;'>
            <tr>
                <td>Name: </td>
                <td><input name="name" type="text" size="40" required /></td>
            </tr>
            <tr>
                <td>Price: </td>
                <td><input name="price" type="text" size="40" required /></td>
            </tr>

            <tr>
                <td>Image URL (Optional): </td>
                <td><input type="text" name="image" size="40" />  </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td><input type="text" name="description" size="40" required /></td>
            </tr>

            <tr>
                <td>Quantity: </td>
                <td><input type="number" name="quantity" size="40" required /></td>
            </tr>

            <tr>
                <td>Manufacturer ID: </td>
                <td><input type="number" name="manufacturer" size="40" value='1001' required /></td>
            </tr>
        </table>
        <input type="submit" name="Submit" id="Submit" value="Register" />

    </form>
    <h2 style='text-align: center'> Manufacturer Codes</h2>

    <table style='margin-left:auto;margin-right:auto;'>
        <tr>
            <td>HP</td>
            <td>1001</td>
        </tr>
        <tr>
            <td>Canon</td>
            <td>1002</td>
        </tr>

        <tr>
            <td>Xerox</td>
            <td>1003</td>
        </tr>

        <tr>
            <td>Epson</td>
            <td>1004</td>
        </tr>

        <tr>
            <td>Dell</td>
            <td>1005</td>
        </tr>

        <tr>
            <td>Brother</td>
            <td>1006</td>
        </tr>
    </table>

<?php
include ('includes/footer.php');