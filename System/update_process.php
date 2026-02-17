<?php
session_start();
// Hubi in qofka uu yahay Admin si uusan qof kale xogta u beddelin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

// 1. Hubi in xogta lagu soo diray habka POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Nadiifi xogta (Sanitization)
    $id          = mysqli_real_escape_string($conn, $_POST['id']);
    $name        = trim(htmlspecialchars($_POST['name']));
    $description = trim(htmlspecialchars($_POST['description']));
    $status      = trim(htmlspecialchars($_POST['status']));

    // 3. Xaqiiji in xogta muhiimka ah aysan marnayn
    if (empty($id) || empty($name) || empty($description)) {
        header("Location: view.php?error=empty_fields");
        exit();
    }

    // 4. Isticmaal Prepared Statements si loo sugo ammaanka
    $sql = "UPDATE employees SET name = ?, description = ?, status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // "sssi" waxay ka dhigan tahay: String, String, String, Integer
        mysqli_stmt_bind_param($stmt, "sssi", $name, $description, $status, $id);
        
        // 5. Fulinta amarka iyo hubinta haddii uu guuleystay
        if (mysqli_stmt_execute($stmt)) {
            // Success: Dib ugu laabo view.php adigoo faraxsan
            header("Location: view.php?success=updated");
            exit();
        } else {
            // Error: Database-ka ayaa dhib ka dhacay
            header("Location: view.php?error=update_failed");
            exit();
        }
        
        mysqli_stmt_close($stmt);
    } else {
        header("Location: view.php?error=system_error");
        exit();
    }

    mysqli_close($conn);

} else {
    // Haddii qofku isku dayo inuu si toos ah u soo galo boggan isagoon foom soo marin
    header("Location: view.php");
    exit();
}
?>