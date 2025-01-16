<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Calendar Trigger</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        
        .calendar {
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(7, 50px);
            grid-gap: 10px;
            justify-content: center;
                
        }
        .day {
            padding: 10px;
            background-color: #ececec;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .day:hover {
            background-color: #d4d4d4;
        }
        .login-form {
            display: none;
            margin-top: 20px;
        }
        .login-form input {
            margin: 5px 0;
            padding: 10px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-form button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #0056b3;
        }
    </style>

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

<main>
<div class="container">
        <h1>Click a Date to Sign In</h1>
        <div class="calendar">
            <!-- Days of the month -->
            <div class="day">1</div>
            <div class="day">2</div>
            <div class="day">3</div>
            <div class="day">4</div>
            <div class="day">5</div>
            <div class="day">6</div>
            <div class="day">7</div>
            <div class="day">8</div>
            <div class="day">9</div>
            <div class="day">10</div>
            <div class="day">11</div>
            <div class="day">12</div>
            <div class="day">13</div>
            <div class="day">14</div>
            <div class="day">15</div>
            <div class="day">16</div>
            <div class="day">17</div>
            <div class="day">18</div>
            <div class="day">19</div>
            <div class="day">20</div>
            <div class="day">21</div>
            <div class="day">22</div>
            <div class="day">23</div>
            <div class="day">24</div>
            <div class="day">25</div>
            <div class="day">26</div>
            <div class="day">27</div>
            <div class="day">28</div>
            <div class="day">29</div>
            <div class="day">30</div>
            <div class="day">31</div>
        </div>
        <div class="login-form" id="loginForm">
            <h2>Login</h2>
            <input type="text" placeholder="Username" id="username">
            <input type="password" placeholder="Password" id="password">
            <button onclick="submitLogin()">Sign In</button>
        </div>
    </div>

    <script>
        const days = document.querySelectorAll('.day');
        const loginForm = document.getElementById('loginForm');

        days.forEach(day => {
            day.addEventListener('click', () => {
                alert(`You clicked date: ${day.textContent}`);
                loginForm.style.display = 'block';
            });
        });

        function submitLogin() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            if (username && password) {
                alert(`Welcome, ${username}!`);
                loginForm.style.display = 'none';
            } else {
                alert('Please fill in all fields.');
            }
        }
    </script>
</main>
    
</body>
</html>