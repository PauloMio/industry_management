<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $product_name = $_POST['product_name'];
    $image = $_FILES['image']['name'];
    $upload_dir = 'uploads/';
    $upload_file = $upload_dir . basename($image);

    // Create uploads directory if it doesn't exist
    if (!file_exists($upload_dir)) {
        if (!mkdir($upload_dir, 0777, true)) {
            die("Failed to create uploads directory.");
        }
    }

    // Check for upload errors
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        die("File upload error: " . $_FILES['image']['error']);
    }

    // Move uploaded file and validate
    if (!empty($image) && move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
        if ($type === 'Tension') {
            $sql = "INSERT INTO `tbl_bolting_tension`(`product_name`, `image`, `range_cap`, `bolt_hole_diam`, `bolt_len`, `bolt_dim`, `load_kn`, `pressure`, `bolt_diam`, `temp`) 
                    VALUES (:product_name, :image, :range_cap, :bolt_hole_diam, :bolt_len, :bolt_dim, :load_kn, :pressure, :bolt_diam, :temp)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':product_name' => $product_name,
                ':image' => $image,
                ':range_cap' => $_POST['range_cap'] ?? null,
                ':bolt_hole_diam' => $_POST['bolt_hole_diam'] ?? null,
                ':bolt_len' => $_POST['bolt_len'] ?? null,
                ':bolt_dim' => $_POST['bolt_dim'] ?? null,
                ':load_kn' => $_POST['load_kn'] ?? null,
                ':pressure' => $_POST['pressure'] ?? null,
                ':bolt_diam' => $_POST['bolt_diam'] ?? null,
                ':temp' => $_POST['temp'] ?? null,
            ]);
        } elseif ($type === 'Torque') {
            $sql = "INSERT INTO `tbl_bolting_torque`(`product_name`, `image`, `torque_cap`, `avail_sq_drive`, `drive_in`, `drive_out`, `sq_drive`) 
                    VALUES (:product_name, :image, :torque_cap, :avail_sq_drive, :drive_in, :drive_out, :sq_drive)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':product_name' => $product_name,
                ':image' => $image,
                ':torque_cap' => $_POST['torque_cap'] ?? null,
                ':avail_sq_drive' => $_POST['avail_sq_drive'] ?? null,
                ':drive_in' => $_POST['drive_in'] ?? null,
                ':drive_out' => $_POST['drive_out'] ?? null,
                ':sq_drive' => $_POST['sq_drive'] ?? null,
            ]);
        }
        echo "Data successfully added! Image saved as: " . htmlspecialchars($image);
        // Redirect to management.php after successful insertion
        header("Location: management.php");
        exit;
    } else {
        echo "Failed to upload image.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record</title>
</head>
<body>
    <h1>Add Record</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="type">Select Type:</label>
        <select name="type" id="type" required>
            <option value="">--Select--</option>
            <option value="Tension">Tension</option>
            <option value="Torque">Torque</option>
        </select><br><br>
        
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required><br><br>

        <div id="tension-fields" style="display: none;">
            <label for="range_cap">Range Cap:</label>
            <input type="text" id="range_cap" name="range_cap"><br><br>
            <label for="bolt_hole_diam">Bolt Hole Diameter:</label>
            <input type="text" id="bolt_hole_diam" name="bolt_hole_diam"><br><br>
            <label for="bolt_len">Bolt Length:</label>
            <input type="text" id="bolt_len" name="bolt_len"><br><br>
            <label for="bolt_dim">Bolt Dimension:</label>
            <input type="text" id="bolt_dim" name="bolt_dim"><br><br>
            <label for="load_kn">Load (kN):</label>
            <input type="text" id="load_kn" name="load_kn"><br><br>
            <label for="pressure">Pressure:</label>
            <input type="text" id="pressure" name="pressure"><br><br>
            <label for="bolt_diam">Bolt Diameter:</label>
            <input type="text" id="bolt_diam" name="bolt_diam"><br><br>
            <label for="temp">Temperature:</label>
            <input type="text" id="temp" name="temp"><br><br>
        </div>

        <div id="torque-fields" style="display: none;">
            <label for="torque_cap">Torque Cap:</label>
            <input type="text" id="torque_cap" name="torque_cap"><br><br>
            <label for="avail_sq_drive">Available Square Drive:</label>
            <input type="text" id="avail_sq_drive" name="avail_sq_drive"><br><br>
            <label for="drive_in">Drive In:</label>
            <input type="text" id="drive_in" name="drive_in"><br><br>
            <label for="drive_out">Drive Out:</label>
            <input type="text" id="drive_out" name="drive_out"><br><br>
            <label for="sq_drive">Square Drive:</label>
            <input type="text" id="sq_drive" name="sq_drive"><br><br>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        const typeSelect = document.getElementById('type');
        const tensionFields = document.getElementById('tension-fields');
        const torqueFields = document.getElementById('torque-fields');

        typeSelect.addEventListener('change', () => {
            if (typeSelect.value === 'Tension') {
                tensionFields.style.display = 'block';
                torqueFields.style.display = 'none';
            } else if (typeSelect.value === 'Torque') {
                torqueFields.style.display = 'block';
                tensionFields.style.display = 'none';
            } else {
                tensionFields.style.display = 'none';
                torqueFields.style.display = 'none';
            }
        });
    </script>
</body>
</html>
