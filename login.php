login.php:
<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['password'] === $password) {
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $user_data['username'];
            header("Location: index.php");
            exit();
        } else {
            echo "Wrong username or password!";
        }
    } else {
        echo "Wrong username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<div id = "box">   
<form method="post">
        <input id="text" type="text" name="username" placeholder="Username" required><br>
        <input id= "text" type="password" name="password" placeholder="Password" required><br>
        <input id = "button"type="submit" value="Login"><br>
    </form>
    <a href="signup.php">Click to sign up</a>
</div>

</body>