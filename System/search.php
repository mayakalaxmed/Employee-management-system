<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';

$keyword = '';
$result = null;

if (isset($_POST['search'])) {
    $keyword = trim($_POST['keyword']);
    // Professional & Secure Search Query
    $query = "SELECT * FROM employees WHERE name LIKE ? OR status LIKE ? OR description LIKE ? ORDER BY id DESC";
    $stmt = mysqli_prepare($conn, $query);
    $search_term = "%$keyword%";
    mysqli_stmt_bind_param($stmt, "sss", $search_term, $search_term, $search_term);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    // Show all if no search
    $result = mysqli_query($conn, "SELECT * FROM employees ORDER BY id DESC LIMIT 10");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Employees | EMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { display: flex; min-height: 100vh; background-color: #f5f3ff; }
        
        .sidebar { width: 260px; background: #1e1b4b; color: white; position: fixed; height: 100vh; }
        .main-wrapper { flex: 1; margin-left: 260px; display: flex; flex-direction: column; }
        .content { padding: 40px; flex: 1; }

        .page-header { margin-bottom: 30px; }
        .page-header h2 { color: #1e1b4b; border-left: 5px solid #6b21a8; padding-left: 15px; margin-bottom: 20px; }

        /* Modern Search Box */
        .search-container {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .search-form { display: flex; gap: 10px; }
        .search-input {
            flex: 1;
            padding: 12px 20px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            transition: 0.3s;
        }
        .search-input:focus { border-color: #6b21a8; box-shadow: 0 0 0 3px rgba(107, 33, 168, 0.1); }

        .btn-search {
            padding: 12px 25px;
            background: #6b21a8;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-search:hover { background: #581c87; }

        /* Table Styling */
        .table-container { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #f3f4f6; }
        thead tr { background: #f9fafb; color: #4b5563; font-size: 14px; }
        
        .status-pill { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .active { background: #dcfce7; color: #166534; }
        .inactive { background: #fee2e2; color: #991b1b; }

        .action-links a { text-decoration: none; font-size: 13px; font-weight: 600; margin-right: 10px; }
        .edit-link { color: #6b21a8; }
        .delete-link { color: #dc2626; }

        footer { background: #6b21a8; color: white; text-align: center; padding: 15px; margin-top: auto; }
    </style>
</head>
<body>

    <div class="sidebar"><?php include 'sidebar.php'; ?></div>

    <div class="main-wrapper">
        <div class="content">
            <div class="page-header">
                <h2>Search Employees</h2>
            </div>

            <div class="search-container">
                <form method="POST" action="" class="search-form">
                    <input type="text" name="keyword" class="search-input" placeholder="Search by name, title or status..." value="<?php echo htmlspecialchars($keyword); ?>">
                    <button type="submit" name="search" class="btn-search">
                        <i class="fas fa-search"></i> Search
                    </button>
                    <?php if(!empty($keyword)): ?>
                        <a href="search.php" style="padding: 12px; color: #6b7280; text-decoration: none;">Clear</a>
                    <?php endif; ?>
                </form>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>#<?php echo $row['id']; ?></td>
                                <td style="font-weight: 600;"><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <span class="status-pill <?php echo strtolower($row['status']); ?>">
                                        <?php echo $row['status']; ?>
                                    </span>
                                </td>
                                <td class="action-links">
                                    <a href="update.php?id=<?php echo $row['id']; ?>" class="edit-link"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 40px; color: #9ca3af;">
                                    <i class="fas fa-info-circle"></i> No employees found matching your search.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <footer>&copy; 2025 Employee Management System</footer>
    </div>

</body>
</html>