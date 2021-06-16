<?php
/**
 * Author: "Cody Hough"
 * Date:12/11/19
 * File: loginform.php
 * Description: For for login
 */

    $page_title = "Office Zone Login";
    require_once('includes/header.php');
    ?>
    <h2>Login or Register</h2>

<?php
$message = "Please enter your username and password to login.";
//check the login status
$login_status = '';
if(isset($_SESSION['login_status'])) {
    $login_status = $_SESSION['login_status'];
}

switch ($login_status) {
    case 1: // the user's last login attempt succeeded
        echo"<p>You are logged in as " . $_SESSION['login'] . "</p>";
        echo "<a href=logout.php>Logout</a><br>";
        include "includes/footer.php";
        exit;
    case 3: //user has just registered
        echo"<p>Thank you for registering with us. Your account has been created.";
        echo "<a href=logout.php>Logout</a><br>";
        include "includes/footer.php";
        exit;
    case 2: //the user's last login attempt failed
        $message = "Username or password invalid. Please try again.";
}
?>
    <div class="login-container">
        <!-- display the login form -->
        <div class="login">
            <form method='post' action='login.php'>
                <table>
                    <tr>
                        <td colspan="2"><?php echo $message; ?></br><br></td>
                    </tr>
                    <tr>
                        <td style="width: 80px">User name: </td>
                        <td><input type='text' name='username' required></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type='password' name='password' required></td>
                    </tr>
                    <tr>
                        <td colspan='2' style='padding: 10px 0 0 85px' class="bookstore-button">
                            <input type='submit' value='  Login  '>
                            <input type="button" name="Cancel" value="Cancel" onclick="window.location.href = 'listbooks.php'" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- display the registration form -->
        <div class="registration">
            <form action="register.php" method="post">
                <table>
                    <tr>
                        <td colspan="2" align="left">If you are new to our site, please create an account.<br><br></td>
                    </tr>
                    <tr>
                        <td style="width: 85px">First Name: </td>
                        <td><input name="firstname" type="text" required></td>
                    </tr>
                    <tr>
                        <td>Last Name: </td>
                        <td><input name="lastname" type="text" required></td>
                    </tr>
                    <tr>
                        <td>User Name: </td>
                        <td><input name="username" type="text" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input name="password" type="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style='padding: 10px 0 0 80px' class="bookstore-button">
                            <input type="submit" value="Register" />
                            <input type="button" value="Cancel" onclick="window.location.href = 'listbooks.php'" />
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>

<?php
include ('includes/footer.php');

