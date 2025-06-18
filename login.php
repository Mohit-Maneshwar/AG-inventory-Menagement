<?php
session_start();

// Dummy credentials (use DB in production)
$valid_username = "admin";
$valid_password = "123456";

$error = "";

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["userName"] ?? '';
    $Spassword = $_POST["Spassword"] ?? '';

    if ($username === $valid_username && $Spassword === $valid_password) {
        $_SESSION["username"] = $username;

        // Optional: Set cookie for 1 hour
        setcookie("username", $username, time() + 3600, "/");

        header("Location: welcome.php");
        exit();
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background: #121212;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        .login-box {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
            width: 300px;
            animation: fadeIn 1s ease-in-out;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background: #2c2c2c;
            color: #fff;
            font-size: 16px;
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            background: #6200ea;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-box button:hover {
            background: #3700b3;
        }

        .error {
            color: #ff6b6b;
            text-align: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="loginData.php">
            <input type="text" name="username" placeholder="Username" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <!-- Add this inside your login-box, after the form -->
        <p style="text-align:center; margin-top: 15px;">
            Don't have an account?
            <a href="register.php" style="color: #bb86fc; text-decoration: none;">Register here</a>
        </p>

    </div>
</body>

</html>