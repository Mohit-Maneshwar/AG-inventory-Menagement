<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            background: #121212;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .btn {
            margin-top: 20px;
            background: #ff0266;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #c51162;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($username) ?>!</h1>
    <a href="logoutAJAX.php"><button class="btn">Logout</button></a>
</body>
</html>
