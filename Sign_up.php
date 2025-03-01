<?php
session_start();
include("connection.php");
include("functions.php");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($user_name) && !empty($password)) {
        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
        mysqli_query($con, $query);
        header("Location: LoginPage.php");
        die;
    } else {
        echo "Моля сложете валидна информация.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нахрани се там - Вкусно!</title>
    <link rel="stylesheet" href="Sign_up.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <style>
        

    </style>
</head>

<body>

<div class="square">
    <div class="button"> 
        <a href="index.html" class="button-link">Начало</a>
    </div>
    <div class="button2"> 
        <a href="rec-res.php" class="button-link">Предложи</a>
    </div>
    <div class="button3"> 
        <a href="" class="button-link">За нас</a>
    </div>
    <div class="button4"> 
        <a href="" class="button-link">Q&A</a>
    </div>
    <div class="button5"> 
    <div class="dropdown">
            <button class="button-menu">Профил</button>
            <div class="button-dropdown">
                <a href="LoginPage.php">Влизане</a>
                <a href="Sign_up.php">Регистриране</a>
                <a href="logout.php">Излизане</a>
            </div>
        </div>
    </div>
</div>



<div id="box">   
    <form method="post">
        <input id="text" type="text" name="username" placeholder="Име" required><br>
        <input id="text" type="password" name="password" placeholder="Парола" required><br>
       
        <input id="button" type="submit" value="Регистрация"><br>
    
    </form>
    <div class="ab">
    <a href="LoginPage.php" class="ab-link">Влизане</a>
    </div>
</div>



</body>
</html>

