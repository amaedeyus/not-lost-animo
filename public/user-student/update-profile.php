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

    <div class="ad-overlay" id="adOverlay" style="pointer-events: auto;"></div>
    <div class="ad-popup" id="adPopup">
        <div class="ad-header">
            <h3 class="ad-title">Special Advertisement</h3>
            <button class="close-ad" onclick="closeAd()">×</button>
        </div>
        <div class="ad-content">
            <?php
            $videos = ['cokevid1.mp4', 'cokevid2.mp4', 'cokevid3.mp4', 'cokevid4.mp4', 'cokevid5.mp4'];
            $randomVideo = $videos[array_rand($videos)];
            ?>
            <video class="ad-video" controls autoplay muted>
                <source src="../media/ads/<?php echo $randomVideo; ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <p class="ad-description">Enjoy this special message from our sponsor!</p>
        </div>
    </div>

    <div class="top-banner" id="topBanner">
        <img src="../media/ads/cokegif.gif" alt="Coca-Cola Banner">
        <button class="close-banner" onclick="closeBanner()">×</button>
    </div>

    <div class="right-banner" id="rightBanner">
        <img src="../media/ads/cokebanner2.jpg" alt="Coca-Cola Right Banner">
        <button class="close-right-banner" onclick="closeRightBanner()">×</button>
    </div>

<script>
    // Ad popup functionality
    window.onload = function() {
        setTimeout(function() {
            document.getElementById('adOverlay').style.display = 'block';
            document.getElementById('adPopup').style.display = 'block';
            document.body.style.overflow = 'hidden'; // Prevent scrolling when ad is shown
        }, 2000); // Show after 2 seconds
    }

    function closeAd() {
        var video = document.querySelector('.ad-video');
        if (video) {
            video.pause();
            video.currentTime = 0;
        }
        document.getElementById('adOverlay').style.display = 'none';
        document.getElementById('adPopup').style.display = 'none';
        document.body.style.overflow = 'auto'; // Re-enable scrolling when ad is closed
    }

    // Banner functionality
    function closeBanner() {
        document.getElementById('topBanner').style.display = 'none';
    }

    function closeRightBanner() {
        document.getElementById('rightBanner').style.display = 'none';
    }
</script>

<link rel="stylesheet" href="../css/base.css?v=<?= time() ?>">
<link rel="stylesheet" href="../css/header.css?v=<?= time() ?>">
<link rel="stylesheet" href="../css/profile.css?v=<?= time() ?>">
<link rel="stylesheet" href="../css/menu-bar.css?v=<?= time() ?>">
<link rel="stylesheet" href="../css/ads.css?v=<?= time() ?>">
<link rel="stylesheet" href="../css/banner.css?v=<?= time() ?>">
<style>
    header {
        display: flex;
        align-items: center;
    }

    header .logo-img {
        height: 60px;
        width: auto;
    }

    .add-button {
        margin-left: auto; /* Push to the right */
    }

    /* User Profile Styles */
    .user-profile {
        position: relative;
        cursor: pointer;
        padding: 8px 15px;
        background-color: #4CAF50;
        color: white;
        border-radius: 20px;
        margin-left: 15px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        border-radius: 8px;
        overflow: hidden;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
</style>
// ... existing code ... 