<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: view.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM employees WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    header("Location: view.php?error=not_found");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee | EMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { display: flex; min-height: 100vh; background-color: #f5f3ff; }
        
        .sidebar { width: 260px; background: #1e1b4b; color: white; position: fixed; height: 100vh; }
        .main-wrapper { flex: 1; margin-left: 260px; display: flex; flex-direction: column; }
        
        .content { padding: 40px; display: flex; justify-content: center; align-items: flex-start; flex: 1; }
        
        .form-card {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .form-card h2 { color: #1e1b4b; margin-bottom: 25px; border-left: 5px solid #6b21a8; padding-left: 15px; }

        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; margin-bottom: 8px; font-size: 14px; color: #6b7280; font-weight: 500; }
        
        .input-field {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
            font-size: 15px;
        }

        .input-field:focus { border-color: #6b21a8; box-shadow: 0 0 0 3px rgba(107, 33, 168, 0.1); }

        .btn-update {
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

        .btn-update:hover { background: #581c87; transform: translateY(-2px); }
        
        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
        }

        footer { background: #6b21a8; color: white; text-align: center; padding: 15px; margin-top: auto; }
    </style>
</head>
<body>

    <div class="sidebar"><?php include 'sidebar.php'; ?></div>

    <div class="main-wrapper">
        <div class="content">
            <div class="form-card">
                <h2><i class="fas fa-user-edit"></i> Edit Employee</h2>
                
                <form method="POST" action="update_process.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="input-group">
                        <label>Full Name</label>
                        <input type="text" name="name" class="input-field" value="<?php echo $row['name']; ?>" required>
                    </div>

                    <div class="input-group">
                        <label>Job Title</label>
                        <input type="text" name="description" class="input-field" value="<?php echo $row['description']; ?>" required>
                    </div>

                    <div class="input-group">
                        <label>Status</label>
                        <select name="status" class="input-field">
                            <option value="Active" <?php if($row['status']=='Active') echo 'selected'; ?>>Active</option>
                            <option value="Inactive" <?php if($row['status']=='Inactive') echo 'selected'; ?>>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-update">
                        <i class="fas fa-sync-alt"></i> Update Employee
                    </button>
                    <a href="view.php" class="btn-cancel">Cancel and Go Back</a>
                </form>
            </div>
        </div>
        <footer>&copy; 2025 Employee Management System</footer>
    </div>

</body>
</html>