<?php
session_start();

// 1. Hubi in qofka uu yahay Admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

// 2. Hubi in ID-ga la soo diray oo uu yahay lambar
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    
    $id = $_GET['id'];

    // 3. Isticmaal Prepared Statement si ammaan ah loogu tirtiro
    $sql = "DELETE FROM employees WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // "i" waxay ka dhigan tahay in ID-gu yahay Integer (Lambar)
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Success: Haddii uu si guuleystay u tirtirmo
            header("Location: view.php?success=deleted");
            exit();
        } else {
            // Error: Haddii database-ka cilad ka dhacdo
            header("Location: view.php?error=delete_failed");
            exit();
        }
        
        mysqli_stmt_close($stmt);
    }
} else {
    // Haddii ID-ga aan la soo dirin ama uu khaldan yahay
    header("Location: view.php");
    exit();
}

mysqli_close($conn);
?>