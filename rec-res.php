<?php
session_start();
include("connection.php");
include("functions.php");


$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нахрани се там - Вкусно!</title>
    <link rel="stylesheet" href="Sigh_up.css">
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
        <input id="text" type="text" name="username" placeholder="Username" required><br>
        <input id="text" type="password" name="password" placeholder="Password" required><br>
        <input id="button" type="submit" value="Signup"><br>
    </form>
   <a href="logout.php">loguot</a>
</div>

</body>
</html>