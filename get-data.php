<?php
include("connection.php"); 

header("Content-Type: application/json");


$query = "SELECT * FROM restaurants WHERE id = 1"; 
$result = mysqli_query($con, $query);

if ($row = mysqli_fetch_assoc($result)) {
    echo json_encode($row); 
} else {
    echo json_encode(["error" => "No data found"]);
}
?>
