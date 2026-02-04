<!DOCTYPE html>
<html>

<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <h1>Add New Employee</h1>
        <a href="index.php"><button class="btn-link">Back to Employee List</button></a>

        <form action="insert.php" method="post">
            Name:
            <input type="text" name="employee_name" required><br><br>

            Email:
            <input type="email" name="email" required><br><br>

            Department:
            <input type="text" name="department" required><br><br>

            <input type="submit" class="btn-success" value="Add Employee">
        </form>

    </div>
</body>

</html>