<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
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

<main class="hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <h1>About Hytec Power Inc. Industrial Division</h1>
    </div>
</main>

<section class="company-content">
    <div class="content-wrapper">
        <div class="content-image">
            <img src="/image/History Image/1.jpg" alt="1994">
        </div>
        <div class="content-text">
            <h2>Established in 1994 by Engr. Eric Jude S. Soliman, Hytec Power Inc. (HPI) is a leading 
                industrial and educational solutions provider in the Philippines.</h2>
            <p>
                It is the trendsetter, market leader, and pioneer in providing total solutions to industry 
                and academic sectors.
                Hytec Power understands the value of essential industrial characteristics such as efficiency,
                 cost, productivity, safety, quality, reliability and time. We aim to be of service to the 
                 industry sector by providing reliable, effective, safe and innovative solutions towards 
                 achieving a sustainable economy.
            </p>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="content-image">
            <img src="/image/History Image/2.png" alt="Over 30 years">
        </div>
        <div class="content-text">
            <h2>For over 30 years in the business, Hytec Power has seen the need to solve the job-skills 
                mismatch in the country.</h2>
            <p>
            We have seen the need for the education sector to address the mismatch between the students’ 
            profile and qualifications and the industry requirements so they will be able to meet the 
            challenges of the workplace, and in a larger context contribute to the society.</p>
        </div>
    </div>
</section>
</body>
</html>
