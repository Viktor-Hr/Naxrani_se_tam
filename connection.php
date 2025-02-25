<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'login_sample_db';

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);


if (!$con) {
    die("Connection failed with login: " . mysqli_connect_error());
}





?>