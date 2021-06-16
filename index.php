
<!-- End of header -->


<?php
$page_title = "Home Page";
include('includes/header.php');
require_once('includes/database.php');

//SELECT statement
$sql = "SELECT * FROM products WHERE id = 4";

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
    echo ("Product not found");
    require 'includes/footer.php';
    die();
}


?>
<h1>Home Page</h1>
<h3>Hello! Welcome to our office supply store! We offer many office supplies such as printers, pens, binders, papers, and so much more!</h3>


<br>

<h1 style="color: red; font-size: 100px">SALE!!!</h1>


<br>
<h3>Check out our hot item below!</h3>
<a href='productdetail.php?id=4'><img src="<?php echo $row['image'] ?>" height="200" width="200"></a>







<?php
require_once('includes/footer.php');