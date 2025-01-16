<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specialization</title>
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
                <li><a href="/menu/CRUD_script/admin_Log-In.php">Admin</a></li>
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

    

</body>
</html>
