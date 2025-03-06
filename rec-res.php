<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $menu = $_POST['menu'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $long = $_POST['long'];
    $lati = $_POST['lati'];
    $id = increasing_num($con);
    $ver = 'no-var';

    if($long <= 90 && $long >= -90 && $lati <= 180 && $lati >= -180) {
        if (!empty($name) && !empty($menu) && !empty($address) && !empty($phone) && !empty($long) && !empty($lati)) {
            $query = "INSERT INTO restaurants (id, name, menu, address, phone, longitude, latitude, ver) 
                      VALUES ('$id', '$name', '$menu', '$address', '$phone', '$long', '$lati', '$ver')";
            mysqli_query($con, $query);
            header("Location: MainPage.html");
            die;
        } else {
            echo "Моля сложете валидна информация.";
        }
    } else {
        echo "Моля сложете валидна Географска дължина и ширина.";
    }
}




if (isset($_SESSION["username"])) {
    $user = $_SESSION["username"];  

    $sql = "SELECT role FROM users WHERE user_name = ? LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role = $row['role'];  

   
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Session username is not set.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нахрани се там - Вкусно!</title>
    <link rel="stylesheet" href="rec-res.css">
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
        <a href="" class="button-link">За нас</a>
    </div>
    
    <?php
    if (isset($role) && $role == "admin" ) {
        echo '<div class="button3"> 
                <a href="veri.php" class="button-link">Валидиране</a>
              </div>';
    }
    ?>
    
    <div class="button4"> 
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
        <input id="text" type="text" name="name" placeholder = "Име на Ресторанта" required><br>
        <textarea id="text" type="text" name="menu" placeholder="Меню" style="height:200px" required></textarea><br>
        <input id="text" type="text" name="address" placeholder="Адрес" required><br>
        <input id="text" type="text" name="phone" placeholder="Телефон" required><br>
        <input id="text" type="number" step="0.00000001" name="lati" placeholder="Географска ширина" required><br>
        <input id="text" type="number" step="0.00000001" name="long" placeholder="Географска дължина" required><br>
        <input id="button" type="submit" value="Изпрати"><br>
    </form>
    <div class="ab">
        <a href="logout.php" class="ab-link" >Излез</a>
    </div>
</div>

</body>
</html>
