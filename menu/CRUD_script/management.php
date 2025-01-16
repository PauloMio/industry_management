<?php
include 'db_connection.php';

if (isset($_GET['delete_id']) && isset($_GET['table'])) {
    $deleteId = intval($_GET['delete_id']);
    $table = $_GET['table'];

    // Ensure the table name is valid to prevent SQL injection
    $allowedTables = ['tbl_bolting_tension', 'tbl_bolting_torque'];
    if (in_array($table, $allowedTables)) {
        try {
            $stmt = $pdo->prepare("DELETE FROM $table WHERE id = :id");
            $stmt->execute(['id' => $deleteId]);

            // Redirect to prevent re-submission
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid table name.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .button {
        display: inline-block;
        margin: 0 5px;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        }
        .edit-button {
            background-color: #28a745;
            color: white;
        }
        .edit-button:hover {
            background-color: #218838;
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .add-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Data Management</h1>

    <a href="/menu/CRUD_script/add.php" class="add-button">Add New Record</a>

    <h2>Tension Records</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Image</th>
                <th>Range Cap</th>
                <th>Bolt Hole Diameter</th>
                <th>Bolt Length</th>
                <th>Bolt Dimension</th>
                <th>Load (kN)</th>
                <th>Pressure</th>
                <th>Bolt Diameter</th>
                <th>Temperature</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM tbl_bolting_tension");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                echo "<td><img src='uploads/" . htmlspecialchars($row['image']) . "' alt='Image' style='width:50px; height:auto;'></td>";
                echo "<td>" . htmlspecialchars($row['range_cap']) . "</td>";
                echo "<td>" . htmlspecialchars($row['bolt_hole_diam']) . "</td>";
                echo "<td>" . htmlspecialchars($row['bolt_len']) . "</td>";
                echo "<td>" . htmlspecialchars($row['bolt_dim']) . "</td>";
                echo "<td>" . htmlspecialchars($row['load_kn']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pressure']) . "</td>";
                echo "<td>" . htmlspecialchars($row['bolt_diam']) . "</td>";
                echo "<td>" . htmlspecialchars($row['temp']) . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "&table=tbl_bolting_tension' class='button edit-button'>Edit</a>";
                echo "<a href='?delete_id=" . $row['id'] . "&table=tbl_bolting_tension' class='button delete-button' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>


    <h2>Torque Records</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Image</th>
                <th>Torque Cap</th>
                <th>Available Square Drive</th>
                <th>Drive In</th>
                <th>Drive Out</th>
                <th>Square Drive</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM tbl_bolting_torque");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                echo "<td><img src='uploads/" . htmlspecialchars($row['image']) . "' alt='Image' style='width:50px; height:auto;'></td>";
                echo "<td>" . htmlspecialchars($row['torque_cap']) . "</td>";
                echo "<td>" . htmlspecialchars($row['avail_sq_drive']) . "</td>";
                echo "<td>" . htmlspecialchars($row['drive_in']) . "</td>";
                echo "<td>" . htmlspecialchars($row['drive_out']) . "</td>";
                echo "<td>" . htmlspecialchars($row['sq_drive']) . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "&table=tbl_bolting_torque' class='button edit-button'>Edit</a>";
                echo "<a href='?delete_id=" . $row['id'] . "&table=tbl_bolting_torque' class='button delete-button' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
