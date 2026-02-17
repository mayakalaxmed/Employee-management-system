<?php
/**
 * Professional Logout Script
 * Tirtiridda Session-ka iyo Amniga isticmaalaha
 */

session_start();

// 1. Faah dhammaan session variables-ka
$_SESSION = array();

// 2. Tirtir cookie-ga session-ka haddii uu jiro (Amni dheeraad ah)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Burburi session-ka gabi ahaanba
session_destroy();

// 4. U weeci bogga login-ka adigoo raacinaya fariin guul ah (Success Message)
header("Location: login.php?message=logged_out");
exit();
?>