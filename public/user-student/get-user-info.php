<?php
session_start(); // Make sure session is started
require("../include/conn.php");

// Initialize empty variables
$fullName = "Guest";
$email = "";

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