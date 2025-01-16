<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinery</title>
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
        <div class="card">
            <img src="/image/Specialization/Machinery/1.png" alt="Machine" class="card-image">
            <h3>Induction Bolt Header</h3>
            <button class="popup-btn" onclick="toggleCardDetails(this)">Show More</button>
            <div class="card-details">
                <p>
                    <ul>
                        <li>Range Capacity: </li>
                        <li>Bolt Hole Diameter: 10mm to 30mm</li>
                        <li>Bolt Length: 100mm to 2000mm</li>
                        <li>Bolt Dimension: Up to 6 inches</li>
                    </ul>
                </p>
            </div>
        </div>

        <div class="card">
            <img src="/image/Specialization/Machinery/2.png" alt="Machine" class="card-image">
            <h3>Hydraulic Bolt Tensioner</h3>
            <button class="popup-btn" onclick="toggleCardDetails(this)">Show More</button>
            <div class="card-details">
                <p>
                    <ul>
                        <li>Range Capacity: </li>
                        <li>Load: 16Kn to 4700KN</li>
                        <li>Pressure: 1500 Bars (22,000 psi)</li>
                        <li>Bolt Dimension: M20 to M150</li>
                    </ul>
                </p>
            </div>
        </div>

        <div class="card">
            <img src="/image/Specialization/Machinery/3.png" alt="Machine" class="card-image">
            <h3>Mechanical Bolt Tensioner</h3>
            <button class="popup-btn" onclick="toggleCardDetails(this)">Show More</button>
            <div class="card-details">
                <p>
                    <ul>
                        <li>Range Capacity: </li>
                        <li>Bolt Dia.: Metric M16 to M160</li>
                        <li>Bolt Dia.: Imperial 3/4" to 6"</li>
                        <li>Temp.: -40 deg C to 350 Deg.C.</li>
                    </ul>
                </p>
            </div>
        </div>
    </section>

</body>
</html>
