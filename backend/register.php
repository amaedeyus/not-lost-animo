<?php
session_start();
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Store user details in the database
    $sql = "INSERT INTO users (email, password, type, created_at) VALUES ('$email', '$hashed_password', 'user', NOW())";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
        header("Location: ../public/system-login/front-end.html"); // Redirect to login page
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>