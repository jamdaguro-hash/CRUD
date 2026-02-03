<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $employee_name = $_POST['employee_name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "INSERT INTO employee_list (employee_name, email, department)
            VALUES ('$employee_name', '$email', '$department')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
