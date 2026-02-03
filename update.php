<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST['id_no'];
    $employee_name = $_POST['employee_name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "UPDATE employee_list 
            SET employee_name='$employee_name',
                email='$email',
                department='$department'
            WHERE id_no=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
