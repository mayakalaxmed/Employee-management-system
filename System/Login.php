<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2; /* light grey */
        }

        /* Header */
        header {
            background-color: #5e2b97; /* purple */
            color: white;
            padding: 15px 30px;
            text-align: center;
        }

        /* Login container */
        .login-container {
            width: 100%;
            height: calc(100vh - 120px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background-color: #ffffff;
            padding: 30px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #5e2b97;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5e2b97;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4a237a;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #ccc;
            text-align: center;
            padding: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<header>
    <h1>Admin Panel</h1>
</header>

<div class="login-container">
    <div class="login-box">
        <h2>Admin Login</h2>
        <form method="POST" action="login_process.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</div>

<footer>
    &copy; 2025 Admin System | All Rights Reserved
</footer>

</body>
</html>
