<?php
session_start();
include 'db_connect.php';

// 1. Hubi in xogta lagu soo diray habka POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Nadiifi xogta si looga fogeeyo qoraallada halista ah (Sanitization)
    $name        = mysqli_real_escape_with_strip_tags($_POST['name']);
    $description = mysqli_real_escape_with_strip_tags($_POST['description']);
    $status      = mysqli_real_escape_with_strip_tags($_POST['status']);

    // 3. Xaqiiji in dhammaan meelaha muhiimka ah la soo buuxiyey
    if (empty($name) || empty($description) || empty($status)) {
        header("Location: add.php?error=empty_fields");
        exit();
    }

    // 4. Isticmaal Prepared Statements si looga hortago SQL Injection
    $sql = "INSERT INTO employees (name, description, status) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // "sss" waxay ka dhigan tahay in saddexda variable ay yihiin Strings
        mysqli_stmt_bind_param($stmt, "sss", $name, $description, $status);
        
        if (mysqli_stmt_execute($stmt)) {
            // Success: Dib ugu laabo view.php adigoo faraxsan
            header("Location: view.php?success=added");
        } else {
            // Error: Haddii database-ka dhib ka dhaco
            header("Location: add.php?error=db_error");
        }
        
        mysqli_stmt_close($stmt);
    } else {
        header("Location: add.php?error=stmt_failed");
    }

    mysqli_close($conn);

} else {
    // Haddii qofku isku dayo inuu si toos ah u soo galo boggan isagoon Form soo buuxin
    header("Location: add.php");
    exit();
}

// Function yar oo lagu nadiifiyo xogta
function mysqli_real_escape_with_strip_tags($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($data))));
}
?>