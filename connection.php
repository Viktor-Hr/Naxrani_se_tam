<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'login_sample_db';

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

/*
if (!$con) {
    die("Connection failed with login: " . mysqli_connect_error());
}
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'res_restaurants';

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$con) {
    die("Connection failed with res: " . mysqli_connect_error());
}
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'val_restaurants';

$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$con) {
    die("Connection failed with val: " . mysqli_connect_error());
}
*/

?>