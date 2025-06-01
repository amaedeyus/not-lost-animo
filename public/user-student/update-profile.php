<?php
session_start();
require("../include/conn.php");

if (!isset($_SESSION['user_index'])) {
    header("Location: ../system-login/front-end.html");
    exit;
}

$user_index = $_SESSION['user_index'];
$response = ['success' => false, 'message' => ''];

// Check if a file was uploaded
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['profile_picture'];
    
    // Validate file type
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowed_types)) {
        $_SESSION['error'] = "Only JPG, PNG, and GIF files are allowed.";
        header("Location: profile.php");
        exit;
    }

    // Validate file size (5MB max)
    if ($file['size'] > 5 * 1024 * 1024) {
        $_SESSION['error'] = "File size must be less than 5MB.";
        header("Location: profile.php");
        exit;
    }

    // Create uploads directory if it doesn't exist
    $upload_dir = "../Media/uploads/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Generate unique filename
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('profile_') . '.' . $extension;
    $filepath = $upload_dir . $filename;

    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        // Update database with new image path - using the correct path format
        $relative_path = "../public/Media/uploads/" . $filename;
        
        $stmt = $conn->prepare("UPDATE students SET image_path = ? WHERE user_index = ?");
        $stmt->bind_param("si", $relative_path, $user_index);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Profile picture updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update profile picture in database.";
        }
    } else {
        $_SESSION['error'] = "Failed to upload file.";
    }
} else if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] !== UPLOAD_ERR_NO_FILE) {
    // Handle upload errors
    $upload_errors = [
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini.",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form.",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
    ];
    $_SESSION['error'] = $upload_errors[$_FILES['profile_picture']['error']] ?? "Unknown upload error.";
}

// Redirect back to profile page
header("Location: profile.php");
exit;
?> 