<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <h2>Log In</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" name="login">Log In</button>
    </form>

    <?php
    // Include the database connection file
    require_once 'db_connection.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query to check login credentials
        $sql = "SELECT `id`, `name`, `username`, `password` FROM `tbl_admin` WHERE `username` = :username LIMIT 1";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verify the password
                if (password_verify($password, $user['password'])) { // Ensure password is hashed in DB
                    // Start a session and redirect
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    header("Location: management.php");
                    exit();
                } else {
                    echo "<p style='color:red;'>Invalid username or password.</p>";
                }
            } else {
                echo "<p style='color:red;'>Invalid username or password.</p>";
            }
        } catch (PDOException $e) {
            echo "<p style='color:red;'>An error occurred: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</body>
</html>