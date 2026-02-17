<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';

// Soo kicinta xogta
$result = mysqli_query($conn, "SELECT * FROM employees ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees | EMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f3ff;
        }

        .sidebar { width: 260px; background: #1e1b4b; color: white; position: fixed; height: 100vh; }

        .main-wrapper {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
        }

        .content { padding: 40px; flex: 1; }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h2 { color: #1e1b4b; border-left: 5px solid #6b21a8; padding-left: 15px; }

        /* Table Styling */
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead tr {
            background-color: #6b21a8;
            color: white;
        }

        th, td { padding: 15px; border-bottom: 1px solid #eee; }

        tbody tr:hover { background-color: #f9f8ff; }

        /* Status Badges */
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-active { background: #dcfce7; color: #166534; }
        .status-inactive { background: #fee2e2; color: #991b1b; }

        /* Action Buttons */
        .btn {
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: 0.3s;
        }
        .btn-edit { background: #f3e8ff; color: #6b21a8; }
        .btn-edit:hover { background: #6b21a8; color: white; }
        
        .btn-delete { background: #fee2e2; color: #dc2626; margin-left: 5px; }
        .btn-delete:hover { background: #dc2626; color: white; }

        /* Alert Messages */
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }

        footer { background: #6b21a8; color: white; text-align: center; padding: 15px; margin-top: auto; }
    </style>
</head>
<body>

    <div class="sidebar">
        <?php include 'sidebar.php'; ?>
    </div>

    <div class="main-wrapper">
        <div class="content">
            <div class="page-header">
                <h2>Employee List</h2>
                <a href="add.php" style="background:#6b21a8; color:white; padding:10px 20px; border-radius:8px; text-decoration:none; font-size:14px;">
                    <i class="fas fa-plus"></i> Add New
                </a>
            </div>

            <?php if(isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> Action completed successfully!
                </div>
            <?php endif; ?>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Job Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>#<?php echo $row['id']; ?></td>
                            <td style="font-weight: 600; color: #1e1b4b;"><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <span class="status <?php echo ($row['status'] == 'Active') ? 'status-active' : 'status-inactive'; ?>">
                                    <?php echo $row['status']; ?>
                                </span>
                            </td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this employee?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <footer>
            &copy; 2025 Employee Management System
        </footer>
    </div>

</body>
</html>