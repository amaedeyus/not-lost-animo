<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session if not already started
}

require("../include/conn.php");

// Store the user index from URL into the session, only if not already set
if (isset($_GET['uid']) && is_numeric($_GET['uid'])) {
    $_SESSION['user_index'] = (int) $_GET['uid'];
}

$fullName = "Guest";
$email = "";

// Only proceed if user_index is stored in session
if (isset($_SESSION['user_index'])) {
    $userIndex = $_SESSION['user_index'];

    $sql = "
        SELECT 
            u.email,
            s.last_name,
            s.first_name
        FROM 
            users u
        LEFT JOIN 
            students s ON u.user_index = s.user_index
        WHERE 
            u.user_index = ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userIndex);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $email = htmlspecialchars($row['email']);
        $lastName = htmlspecialchars($row['last_name']);
        $firstName = htmlspecialchars($row['first_name']);
        $fullName = "$lastName, $firstName";
    }
}
?>