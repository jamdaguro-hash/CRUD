<?php
include 'database.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    echo "No employee ID provided.";
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM employee_list WHERE id_no=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <h1>Edit Employee</h1>

        <a href="index.php"><button class="btn-link">Back to List of Employees</button></a>
        <form action="update.php" method="post">
            <!-- Hidden input for ID -->
            <div class="form-group"><input type="hidden" name="id_no" value="<?= $row['id_no']; ?>"></div>

            Name:
            <div class="form-group"><input type="text" name="employee_name" value="<?= $row['employee_name']; ?>" required><br><br></div>

            Email:
            <div class="form-group"><input type="email" name="email" value="<?= $row['email']; ?>" required><br><br></div>

            Department:
            <div class="form-group"><input type="text" name="department" value="<?= $row['department']; ?>" required><br><br></div>

            <button type="submit" class="btn-primary">Update Employee</button>
        </form>
    </div>
</body>

</html>