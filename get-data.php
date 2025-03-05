<?php

include("connection.php");

$query = "SELECT name, menu, address, phone, latitude, longitude, ver FROM restaurants";
$result = mysqli_query($con, $query);

$restaurants = [];
while ($row = mysqli_fetch_assoc($result)) {
    $restaurants[] = $row;
}

header('Content-Type: application/json');
echo json_encode($restaurants);

?>
