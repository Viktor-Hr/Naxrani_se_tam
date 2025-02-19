<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con)

?>
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
</head>
<body>
    <h1>This is the index page</h1>
    <a href="logout.php">Log out</a>
    <br>
    <?php
    if (isset($_SESSION['user_id'])) {
        echo "Hello, " . $_SESSION['username'];
    }
    ?>
</body>
</html>