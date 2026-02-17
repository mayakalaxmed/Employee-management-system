<!DOCTYPE html>
<html lang="so">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee System - Purple Theme</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --main-purple: #6b21a8; /* Purple madow ah */
            --light-purple: #9333ea; /* Purple dhalaalaya */
            --bg-body: #f5f3ff;    /* Background-ka guud oo cadaan xiga */
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- HEADER SECTION --- */
        header {
            background-color: var(--main-purple);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header .logo {
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* --- LAYOUT DHEXDA --- */
        .wrapper {
            display: flex;
            flex: 1; /* Tani waxay hubinaysaa in footer-ku hoos maro */
        }

        /* --- SIDEBAR SECTION --- */
        .sidebar {
            width: 250px;
            background-color: var(--white);
            border-right: 1px solid #e5e7eb;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: #4b5563;
            text-decoration: none;
            transition: 0.3s;
            font-weight: 500;
        }

        .sidebar ul li a i {
            margin-right: 15px;
            font-size: 18px;
            color: var(--main-purple);
        }

        .sidebar ul li a:hover {
            background-color: #f3e8ff;
            color: var(--main-purple);
            border-left: 5px solid var(--main-purple);
        }

        /* --- MAIN CONTENT --- */
        .content {
            flex: 1;
            padding: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }

        /* --- FOOTER SECTION --- */
        footer {
            background-color: var(--main-purple);
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo"><i class="fas fa-user-shield"></i> EMS PRO</div>
        <div class="user-info">Admin Account <i class="fas fa-chevron-down"></i></div>
    </header>

    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="index.php"><i class="fas fa-th-large"></i> Dashboard</a></li>
                <li><a href="add.php"><i class="fas fa-plus-circle"></i> Add Employee</a></li>
                <li><a href="view.php"><i class="fas fa-list"></i> View Employees</a></li>
                <li><a href="search.php"><i class="fas fa-search"></i> Search</a></li>
                <li><a href="logout.php" style="margin-top: 20px; color: #dc2626;"><i class="fas fa-power-off" style="color: #dc2626;"></i> Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <div class="card">
                <h2>Ku soo dhowaw Maamulka Shaqaalaha</h2>
                <hr style="margin: 15px 0; opacity: 0.2;">
                <p>Kani waa dashboard-kaaga rasmiga ah. Waxaad halkan ka maamuli kartaa dhamaan xogta shaqalaha adigoo isticmaalaya menu-ka bidixda.</p>
            </div>
        </div>
    </div>
    

    <footer>
        &copy; 2024 Employee Management System | Developed by YourName
    </footer>

</body>
</html>