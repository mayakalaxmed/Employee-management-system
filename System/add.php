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
    <title>Add Employee | EMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f3ff;
        }

        /* Sidebar & Main Wrapper logic (sidii dashboard-ka) */
        .sidebar {
            width: 260px;
            background: #1e1b4b;
            color: white;
            position: fixed;
            height: 100vh;
        }

        .main-wrapper {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
        }

        .content {
            padding: 40px;
            display: flex;
            justify-content: center; /* Foomka dhexda ayuu keenayaa */
            align-items: flex-start;
            flex: 1;
        }

        /* Form Card Styling */
        .form-card {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .form-card h2 {
            color: #1e1b4b;
            margin-bottom: 25px;
            font-size: 22px;
            border-left: 5px solid #6b21a8;
            padding-left: 15px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .input-group input, .input-group select {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
            font-size: 15px;
        }

        .input-group input:focus, .input-group select:focus {
            border-color: #6b21a8;
            box-shadow: 0 0 0 3px rgba(107, 33, 168, 0.1);
        }

        /* Button Styling */
        .btn-submit {
            width: 100%;
            padding: 13px;
            background: #6b21a8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background: #581c87;
            transform: translateY(-2px);
        }

        footer {
            background: #6b21a8;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <?php include 'sidebar.php'; ?>
    </div>

    <div class="main-wrapper">
        <div class="content">
            <div class="form-card">
                <h2><i class="fas fa-user-plus"></i> Register EMS</h2>
                
                <form method="POST" action="save.php">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder=" Fullname" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-briefcase"></i>
                        <input type="text" name="description" placeholder=" (Job Title)" required>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-toggle-on"></i>
                        <select name="status">
                            <option value="Active">Active </option>
                            <option value="Inactive">Inactive </option>
                        </select>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Add Data
                    </button>
                </form>
            </div>
        </div>

        <footer>
            &copy; 2024 Employee Management System
        </footer>
    </div>

</body>
</html>