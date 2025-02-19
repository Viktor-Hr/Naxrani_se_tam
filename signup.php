<?php
session_start();
include("connection.php");
include("functions.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($user_name) && !empty($password)) {
        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
        mysqli_query($con, $query);
        header("Location: login.php");
        die;
    } else {
        echo "Please enter valid information.";
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
<div id = "box">   
<form method="post">
        <input id="text" type="text" name="username" placeholder="Username" required><br>
        <input id= "text" type="password" name="password" placeholder="Password" required><br>
        <input id = "button"type="submit" value="Signup"><br>
    </form>
    <a href="login.php">Click to login</a>
</div>
</body>
</html>