<?php
include 'database.php';

if (!isset($_GET['id'])) {
    echo "No employee ID provided.";
    exit();
}
$id = $_GET['id'];

$sql = "DELETE FROM employee_list WHERE id_no=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
