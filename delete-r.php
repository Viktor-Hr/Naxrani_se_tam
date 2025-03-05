<?php
include("connection.php");

if (isset($_GET['id'])) {
    $restaurantId = $_GET['id'];

    $sql = "DELETE FROM restaurants WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $restaurantId);

    if ($stmt->execute()) {
        echo "<script>window.location.href = 'veri.php';</script>";
    } 
}
?>
