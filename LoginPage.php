
<?php
session_start();
include("connection.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE user_name='$username' LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if ($user_data['password'] === $password) {
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $user_data['username'];
            header("Location: StartPage.html");
            exit();
        } else {
            echo "Грешна парола или име!";
        }
    } else {
        echo "Грешна парола или име!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нахрани се там - Вкусно!</title>
    <link rel="stylesheet" href="LoginPage.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <style>
        

    </style>
</head>

<body>

<div class="square">
    <div class="button"> 
        <a href="StartPage.html" class="button-link">Начало</a>
    </div>
    <div class="button2"> 
        <a href="FirstPage.html" class="button-link">Върни ме</a>
    </div>
</div>




<div id="box">   
    <form method="post">
        <input id="text" type="text" name="username" placeholder="Име" required><br>
        <input id="text" type="password" name="password" placeholder="Парола" required><br>
        <input id="button" type="submit" value="Login"><br>
    </form>
    <a href="Sign_up.php">Натисни да се регистрирате</a>
</div>

</body>
</html>