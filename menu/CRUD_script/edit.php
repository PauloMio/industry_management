<?php
include 'db_connection.php';

if (isset($_GET['id']) && isset($_GET['table'])) {
    $id = intval($_GET['id']);
    $table = $_GET['table'];

    // Ensure the table name is valid to prevent SQL injection
    $allowedTables = ['tbl_bolting_tension', 'tbl_bolting_torque'];
    if (in_array($table, $allowedTables)) {
        try {
            // Fetch the record
            $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $record = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$record) {
                die("Record not found.");
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    } else {
        die("Invalid table name.");
    }
} else {
    die("Missing parameters.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Build the update query dynamically based on the table and provided fields
    $fields = [];
    $params = ['id' => $id];

    foreach ($_POST as $field => $value) {
        if ($field !== 'id' && $field !== 'table' && $field !== 'image') {
            $fields[] = "$field = :$field";
            $params[$field] = $value;
        }
    }

    // Handle the image upload
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Check file type
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $validExtensions)) {
            die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
        }

        // Move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $fields[] = "image = :image";
            $params['image'] = basename($_FILES['image']['name']);
        } else {
            die("Failed to upload the image.");
        }
    }

    if (!empty($fields)) {
        $updateQuery = "UPDATE $table SET " . implode(', ', $fields) . " WHERE id = :id";
        try {
            $stmt = $pdo->prepare($updateQuery);
            $stmt->execute($params);
            header("Location: management.php"); // Redirect to the main page
            exit;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <style>
        form {
            margin: 20px;
            max-width: 500px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Record</h1>

    <form method="POST" enctype="multipart/form-data">
        <?php foreach ($record as $key => $value): ?>
            <?php if ($key === 'id'): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($value) ?>">
            <?php elseif ($key === 'table'): ?>
                <input type="hidden" name="table" value="<?= htmlspecialchars($value) ?>">
            <?php elseif ($key === 'image'): ?>
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
                <p>Current Image: <img src="uploads/<?= htmlspecialchars($value) ?>" alt="Image" style="width: 100px; height: auto;"></p>
            <?php else: ?>
                <label for="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $key))) ?></label>
                <input type="text" id="<?= htmlspecialchars($key) ?>" name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($value) ?>">
            <?php endif; ?>
        <?php endforeach; ?>
        <button type="submit">Update Record</button>
    </form>
</body>
</html>
