<?php
include '../CRUD_script/db_connection.php'; // Corrected relative path

try {
    // Fetch Torque data
    $torqueQuery = "SELECT * FROM tbl_bolting_torque";
    $torqueStmt = $pdo->query($torqueQuery);
    $torqueItems = $torqueStmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch Tension data
    $tensionQuery = "SELECT * FROM tbl_bolting_tension";
    $tensionStmt = $pdo->query($tensionQuery);
    $tensionItems = $tensionStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolting</title>
    <link rel="stylesheet" href="/css/styles.css">

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const links = document.querySelectorAll(".nav ul li a");
            const currentPath = window.location.pathname;

            links.forEach(link => {
                if (link.getAttribute("href") === currentPath) {
                    link.classList.add("active");
                }
            });
        });

        // Pop-up Button functionality
        function toggleCardDetails(button) {
            const card = button.closest('.card');
            const details = card.querySelector('.card-details');
            details.classList.toggle('active');
            button.textContent = details.classList.contains('active') ? 'Show Less' : 'Show More';
        }
    </script>
</head>
<body>
<header class="header">
        <div class="logo">
            <img src="/image/logo_nBG.png" alt="Hytec Power Inc. Logo">
            <h6>Industrial Division</h6>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="/index.php">Home</a></li>
                <li><a href="/menu/company_profile.php">Company Profile</a></li>
                <li><a href="/menu/team.php">Team</a></li>
                <li><a href="/menu/specialization.php">Specialization</a></li>
                <li><a href="/menu/signIn.php">Sign in</a></li>
                <li><a href="/menu/admin_Log-In.php">Admin</a></li>
            </ul>
        </nav>
    </header>

    <!-- New Navbar with Opposite Color Pattern -->
    <nav class="nav-second">
        <ul>
            <li><a href="/menu/Specialization/bolting.php">Bolting</a></li>
            <li><a href="/menu/Specialization/machinery.php">Machinery</a></li>
            <li><a href="#">Electrical</a></li>
            <li><a href="#">Construction</a></li>
            <li><a href="#">Corrosion</a></li>
        </ul>
    </nav>

    <!-- Cards Section -->
    <section class="cards-section">
        <?php foreach ($torqueItems as $item): ?>
        <div class="card">
        <?php
            $imagePath = '/menu/CRUD_script/uploads/' . htmlspecialchars($item['image']);
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                // If the image exists, display it
                echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($item['product_name']) . '" class="card-image">';
            } else {
                // If the image does not exist, display a fallback image
                echo '<img src="/path/to/default-image.jpg" alt="Default Image" class="card-image">';
            }
            ?>
            <h3><?= htmlspecialchars($item['product_name']) ?></h3>
            <button class="popup-btn" onclick="toggleCardDetails(this)">Show More</button>
            <div class="card-details">
                <p>
                    <ul>
                        <?php if (!empty($item['torque_cap'])): ?>
                            <li>Torque Capacity: <?= htmlspecialchars($item['torque_cap']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['avail_sq_drive'])): ?>
                            <li>Available Square Drive: <?= htmlspecialchars($item['avail_sq_drive']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['drive_in'])): ?>
                            <li>Drive In: <?= htmlspecialchars($item['drive_in']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['drive_out'])): ?>
                            <li>Drive Out: <?= htmlspecialchars($item['drive_out']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['sq_drive'])): ?>
                            <li>Square Drive: <?= htmlspecialchars($item['sq_drive']) ?></li>
                        <?php endif; ?>
                    </ul>
                </p>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach ($tensionItems as $item): ?>
        <div class="card">
        <?php
            $imagePath = '/menu/CRUD_script/uploads/' . htmlspecialchars($item['image']);
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
                // If the image exists, display it
                echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($item['product_name']) . '" class="card-image">';
            } else {
                // If the image does not exist, display a fallback image
                echo '<img src="/path/to/default-image.jpg" alt="Default Image" class="card-image">';
            }
            ?>
            <h3><?= htmlspecialchars($item['product_name']) ?></h3>
            <button class="popup-btn" onclick="toggleCardDetails(this)">Show More</button>
            <div class="card-details">
                <p>
                    <ul>
                        <?php if (!empty($item['range_cap'])): ?>
                            <li>Range Cap: <?= htmlspecialchars($item['range_cap']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['bolt_hole_diam'])): ?>
                            <li>Bolt Hole Diameter: <?= htmlspecialchars($item['bolt_hole_diam']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['bolt_len'])): ?>
                            <li>Bolt Length: <?= htmlspecialchars($item['bolt_len']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['bolt_dim'])): ?>
                            <li>Bolt Dimension: <?= htmlspecialchars($item['bolt_dim']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['load_kn'])): ?>
                            <li>Load (kN): <?= htmlspecialchars($item['load_kn']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['pressure'])): ?>
                            <li>Pressure: <?= htmlspecialchars($item['pressure']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['bolt_diam'])): ?>
                            <li>Bolt Diameter: <?= htmlspecialchars($item['bolt_diam']) ?></li>
                        <?php endif; ?>
                        <?php if (!empty($item['temp'])): ?>
                            <li>Temperature: <?= htmlspecialchars($item['temp']) ?></li>
                        <?php endif; ?>
                    </ul>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
</body>
</html>
