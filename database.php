<?php
$conn = mysqli_connect("localhost", "root", "", "crud_database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
