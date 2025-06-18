<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
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
        .register-box {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.6);
            width: 300px;
            animation: fadeIn 1s ease-in-out;
        }
        .register-box h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .register-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background: #2c2c2c;
            color: #fff;
            font-size: 16px;
        }
        .register-box button {
            width: 100%;
            padding: 12px;
            background: #03dac6;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            color: #000;
            cursor: pointer;
            transition: background 0.3s;
        }
        .register-box button:hover {
            background: #018786;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Register</h2>
        <form method="POST" action="registerData.php">
            <input type="text" name="userName" placeholder="Enter User Name" required>
            <input type="password" name="Spassword" placeholder="Create Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="text" name="mobileNo" placeholder="Enter Mobile No." required>
            <button type="submit">Register</button>
        </form>
        <p style="text-align:center; margin-top: 15px;">
            Already have an account?
            <a href="login.php" style="color: #bb86fc; text-decoration: none;">Login here</a>
        </p>
    </div>
</body>
</html>
