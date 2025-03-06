<?php 
ob_start();
session_start();
 include("connection.php");
 include("functions.php");

 $role = "";
 if (isset($_SESSION["username"] )) {
    $user = $_SESSION["username"];  


    $sql = "SELECT role FROM users WHERE user_name = ? LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $user);  
    $stmt->execute();
    $result = $stmt->get_result();
 
    if ($result->num_rows > 0) {
      
        $row = $result->fetch_assoc();
        $role = $row['role']; 

      

    }
 }
 if ($role != "admin" || empty($role)) {
    header("Location: index.html");
    exit();  
}
$sql = "SELECT * FROM restaurants WHERE ver = 'no-var'"; 
$result = $con->query($sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нахрани се там - Вкусно!</title>
    <link rel="stylesheet" href="veri.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

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



<div id="restaurant-list">
    <?php
  
   if ($result->num_rows > 0) {
    while ($restaurant = $result->fetch_assoc()) {
    
        echo "
        <div class='restaurant-box'>
            <h2>{$restaurant['name']}</h2>
            <p><strong>Menu:</strong> {$restaurant['menu']}</p>
            <p><strong>Address:</strong> {$restaurant['address']}</p>
            <p><strong>Phone:</strong> {$restaurant['phone']}</p>
            <div class='buttons'>
                <a href='approve-r.php?id={$restaurant['id']}' class='approve-btn'>Одобри</a>
                <a href='delete-r.php?id={$restaurant['id']}' class='delete-btn' >Изтрий</a>
            </div>
        </div>
        ";
    }
} else {
    echo "<p>Няма открити неодобрени ресторанти.</p>";
}
    ?>
</div>




</body>
</html>
