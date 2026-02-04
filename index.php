<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
<?php
include 'database.php';

$records_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $records_per_page;

$search = isset($_GET['search']) ? $_GET['search'] : '';
<<<<<<< HEAD
$department = isset($_GET['department']) ? $_GET['department'] : '';

$conditions = [];

if ($search) {
    $conditions[] = "(employee_name LIKE '%$search%' OR email LIKE '%$search%')";
}

if ($department) {
    $conditions[] = "department = '$department'";
}

$where = $conditions ? "WHERE " . implode(" AND ", $conditions) : "";

$count_sql = "SELECT COUNT(id_no) FROM employee_list $where";
=======

if ($search) {
    $count_sql = "SELECT COUNT(id_no) FROM employee_list
                  WHERE employee_name LIKE '%$search%'
                     OR email LIKE '%$search%'
                     OR department LIKE '%$search%'";
} else {
    $count_sql = "SELECT COUNT(id_no) FROM employee_list";
}

>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
$count_result = $conn->query($count_sql);
$total_records = $count_result->fetch_row()[0];
$total_pages = ceil($total_records / $records_per_page);

<<<<<<< HEAD
$sql = "SELECT id_no, employee_name, email, department
        FROM employee_list
        $where
        LIMIT $start, $records_per_page";

$result = $conn->query($sql);

=======
if ($search) {
    $sql = "SELECT id_no, employee_name, email, department FROM employee_list
            WHERE employee_name LIKE '%$search%'
               OR email LIKE '%$search%'
               OR department LIKE '%$search%'
            LIMIT $start, $records_per_page";
} else {
    $sql = "SELECT id_no, employee_name, email, department
            FROM employee_list
            LIMIT $start, $records_per_page";
}

$result = $conn->query($sql);
>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Record Management</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>List of Employees</h1>
        <form method="GET" action="index.php">
<<<<<<< HEAD
            <input type="text" name="search"
                placeholder="Search by name or email"
                value="<?= htmlspecialchars($search); ?>">

            <select name="department">
                <option value="">All Departments</option>
                <option value="Admin" <?= (isset($_GET['department']) && $_GET['department'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                <option value="IT" <?= (isset($_GET['department']) && $_GET['department'] == 'IT') ? 'selected' : '' ?>>IT</option>
                <option value="Finance" <?= (isset($_GET['department']) && $_GET['department'] == 'Finance') ? 'selected' : '' ?>>Finance</option>
                <option value="Marketing" <?= (isset($_GET['department']) && $_GET['department'] == 'Marketing') ? 'selected' : '' ?>>Marketing</option>
                <option value="Sales" <?= (isset($_GET['department']) && $_GET['department'] == 'Sales') ? 'selected' : '' ?>>Sales</option>
            </select>

            <button class="btn-primary">Filter</button>

            <?php if (!empty($search) || !empty($_GET['department'])) : ?>
=======
            <input type="text" name="search" placeholder="Search by name or email"
                required>
            <button class="btn-primary">Search</button>
            <?php if (!empty($search)) : ?>
>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
                <a href="index.php">
                    <button type="button">View Users</button>
                </a>
            <?php endif; ?>
<<<<<<< HEAD
        </form>

=======


        </form>
>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
        <a href="create.php">
            <button class="btn-success">Add Employee</button>
        </a>

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['employee_name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['department']; ?></td>
                        <td class="actions">
                            <a href="edit.php?id=<?= $row['id_no']; ?>">
                                <button class="btn-warning">Edit</button>
                            </a>
                            <a href="delete.php?id=<?= $row['id_no']; ?>"
                                onclick="return confirm('Are you sure you want to delete this employee?');">
                                <button class="btn-danger">Delete</button>
                            </a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1): ?>
<<<<<<< HEAD
                <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>&department=<?= urlencode($department) ?>">Previous</a>
=======
                <a href="?page=<?= $page - 1 ?>&search=<?= $search ?>">Previous</a>
>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $page): ?>
                    <strong><?= $i ?></strong>
                <?php else: ?>
<<<<<<< HEAD
                    <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>&department=<?= urlencode($department) ?>"><?= $i ?></a>
=======
                    <a href="?page=<?= $i ?>&search=<?= $search ?>"><?= $i ?></a>
>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
<<<<<<< HEAD
                <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>&department=<?= urlencode($department) ?>">Next</a>
=======
                <a href="?page=<?= $page + 1 ?>&search=<?= $search ?>">Next</a>
>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
            <?php endif; ?>
        </div>


    </div>
</body>

<<<<<<< HEAD
=======
=======
<?php
include 'database.php';

$records_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $records_per_page;

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $count_sql = "SELECT COUNT(id_no) FROM employee_list
                  WHERE employee_name LIKE '%$search%'
                     OR email LIKE '%$search%'
                     OR department LIKE '%$search%'";
} else {
    $count_sql = "SELECT COUNT(id_no) FROM employee_list";
}

$count_result = $conn->query($count_sql);
$total_records = $count_result->fetch_row()[0];
$total_pages = ceil($total_records / $records_per_page);

if ($search) {
    $sql = "SELECT id_no, employee_name, email, department FROM employee_list
            WHERE employee_name LIKE '%$search%'
               OR email LIKE '%$search%'
               OR department LIKE '%$search%'
            LIMIT $start, $records_per_page";
} else {
    $sql = "SELECT id_no, employee_name, email, department
            FROM employee_list
            LIMIT $start, $records_per_page";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Record Management</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>List of Employees</h1>
        <form method="GET" action="index.php">
            <input type="text" name="search" placeholder="Search by name or email"
                required>
            <button class="btn-primary">Search</button>
            <?php if (!empty($search)) : ?>
                <a href="index.php">
                    <button type="button">View Users</button>
                </a>
            <?php endif; ?>


        </form>
        <a href="create.php">
            <button class="btn-success">Add Employee</button>
        </a>

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['employee_name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['department']; ?></td>
                        <td class="actions">
                            <a href="edit.php?id=<?= $row['id_no']; ?>">
                                <button class="btn-warning">Edit</button>
                            </a>
                            <a href="delete.php?id=<?= $row['id_no']; ?>"
                                onclick="return confirm('Are you sure you want to delete this employee?');">
                                <button class="btn-danger">Delete</button>
                            </a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>&search=<?= $search ?>">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $page): ?>
                    <strong><?= $i ?></strong>
                <?php else: ?>
                    <a href="?page=<?= $i ?>&search=<?= $search ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?= $page + 1 ?>&search=<?= $search ?>">Next</a>
            <?php endif; ?>
        </div>


    </div>
</body>

>>>>>>> 0c64a25266bfebc28e3dc3680382388037fd0745
>>>>>>> 08c9b88c36cd53ea8716d98296f0aa86032f2a84
</html>