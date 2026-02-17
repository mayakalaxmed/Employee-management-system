<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="so">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | EMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f3ff;
        }

        /* 1. Sidebar Fix */
        .sidebar {
            width: 260px;
            background: #1e1b4b;
            color: white;
            position: fixed; /* Tani waxay ka dhigaysaa mid dhinac ku dhegan */
            height: 100vh;
            overflow-y: auto;
        }

        /* 2. Main Area Fix */
        .main-wrapper {
            flex: 1;
            margin-left: 260px; /* Waa inuu la mid yahay width-ka sidebar */
            display: flex;
            flex-direction: column; /* Tani waxay footer-ka ku khasbaysaa hoos */
        }

        .content {
            padding: 40px;
            flex: 1; /* Tani waxay buuxinaysaa booska banaan ee ka sareeya footer-ka */
        }

        /* Header Style */
        .header-top {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .welcome-title { font-size: 24px; color: #1f2937; }
        .welcome-title span { color: #6b21a8; font-weight: bold; }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            background: #f3e8ff;
            color: #6b21a8;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            margin-right: 20px;
        }

        .stat-info h3 { font-size: 28px; color: #111827; margin-bottom: 5px; }
        .stat-info p { color: #6b7280; font-size: 14px; }

        /* 3. Footer Fix - Wuxuu markasta ogaanayaa salka hoose */
        footer {
            background: #6b21a8;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto; /* Tani waa muhiim si footer-ku u hoos maro */
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <?php include 'sidebar.php'; ?>
    </div>

    <div class="main-wrapper">
        <header class="header-top">
            <div class="welcome-title">welcome, <span>Admin</span>!</div>
            <div class="admin-profile">
                <img src="https://ui-avatars.com/api/?name=Admin&background=6b21a8&color=fff" style="width: 40px; border-radius: 50%;">
            </div>
        </header>

        <main class="content">
            <p style="color: #6b7280;">Here is the general overview of your system today.</p>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="icon-box"><i class="fas fa-users"></i></div>
                    <div class="stat-info">
                        <h3>124</h3>
                        <p>General Employees</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon-box"><i class="fas fa-user-check"></i></div>
                    <div class="stat-info">
                        <h3>18</h3>
                        <p>Active Employees</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="icon-box"><i class="fas fa-calendar-day"></i></div>
                    <div class="stat-info">
                        <h3>Dec, 2025</h3>
                        <p>Current Month</p>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            &copy; 2025 Employee Management System 
        </footer>
    </div>

</body>
</html>