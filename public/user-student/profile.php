<?php
session_start();
require("../include/conn.php");
require("get-user-info.php");

if (!isset($_SESSION['user_index'])) {
    header("Location: ../system-login/front-end.html");
    exit;
}

// Fetch student info
$user_index = $_SESSION['user_index'];
$student = [];

if ($user_index) {
    $stmt = $conn->prepare("
        SELECT s.*, u.email, 
               sec.section_name,
               p.program_name,
               p.program_code
        FROM students s
        LEFT JOIN users u ON s.user_index = u.user_index
        LEFT JOIN sections sec ON s.section_index = sec.section_index
        LEFT JOIN programs p ON sec.program_index = p.program_index
        WHERE s.user_index = ?
    ");
    $stmt->bind_param("i", $user_index);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Lost Animo - Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../media/dlsl.png">
    <link rel="stylesheet" href="../css/base.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/menu-bar.css?v=<?= time() ?>">
    <style>
        /* Header icon specific styles */
        header .logo-img {
            height: 60px;
            width: auto;
        }

        .search-wrapper img {
            width: 20px;
            height: 20px;
        }

        .add-button img {
            width: 13px;
            height: 13px;
            margin-right: 5px;
        }

        .form-container {
            font-family: 'Nunito', sans-serif;
            background-color: #dff7df;
            width: 450px;
            margin: 30px auto;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container form {
            width: 100%;
        }

        .form-title {
            font-family: 'Nunito', sans-serif;
            text-align: center;
            color: #124d2c;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .form-subtitle {
            font-family: 'Nunito', sans-serif;
            text-align: center;
            color: #3c5f4b;
            margin-bottom: 20px;
        }

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
            width: 100%;
            text-align: center;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
            background-color: #f5f5f5;
            margin-bottom: 10px;
        }

        .upload-btn {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            width: 150px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .upload-btn:hover {
            background-color: #388E3C;
        }

        #profile-upload {
            display: none;
        }

        .profile-title {
            font-weight: bold;
            margin-bottom: 5px;
            color: #124d2c;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #124d2c;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #fff;
            box-sizing: border-box;
            font-size: 14px;
            display: block;
        }

        input[readonly] {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        .radio-group {
            margin-bottom: 15px;
        }

        .radio-group label {
            display: inline-block;
            margin-right: 15px;
            font-weight: normal;
        }

        .button-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 20px;
            font-size: 14px;
            transition: background-color 0.3s ease;
            min-width: 120px;
        }

        .button-container button:hover {
            background-color: #388E3C;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 16px;
            padding-right: 30px;
        }

        /* Search bar styles from item-main.css */
        form {
            width: 30%;
        }

        .search-wrapper {
            gap: 20px;
            position: relative;
            width: 100%;
        }

        .search-wrapper input[type="search"] {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 15px 35px 15px 35px;
            border-radius: 25px;
            font-size: 15px;
            border: none;
        }

        .search-wrapper input[type="search"]:focus {
            outline: none;
        }

        .search-wrapper button {
            padding: 7px 7px 7px 10px;
            display: flex;
            background-color: #4CAF50;
            box-shadow: inset 0px -5px 5px 1px rgba(27, 115, 40, 0.552);
            position: absolute;
            right: 15px;
            top: 50%;
            transition: ease 0.3s;
            transform: translateY(-50%);
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 18px;
        }

        .search-wrapper button:hover {
            background-color: #62b166;
        }

        .search-wrapper img {
            width: 20px;
            height: 20px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <header>
        <img src="../media/logo.png" alt="notlostanimo-logo" class="logo-img">

        <form action="" method="get" name="formadd" enctype="multipart/form-data" novalidate>
            <div class="search-wrapper">
                <input type="search" id="txtsearch" name="q" placeholder="Search..." 
                value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
                <button type="submit"><img src="../media/search.png"></button>
            </div>
        </form>
        
        <button type="button" class="add-button" onclick="window.location.href='add-item.php'">
            <img src="../media/add.png"> Submit Lost Item
        </button>

        <!-- User Profile and Dropdown -->
        <div class="user-profile" onclick="toggleDropdown()">
            <span><?= $fullName ?></span>
            <div class="dropdown-content" id="dropdownMenu">
                <a href="profile.php">My Profile</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </header>

    <h1 class="form-title">Profile Settings</h1>
    <p class="form-subtitle">Update your profile information</p>

    <div class="form-container">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($_SESSION['success']) ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?= htmlspecialchars($_SESSION['error']) ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="update-profile.php" method="post" enctype="multipart/form-data">
            <div class="profile-section">
                <div class="profile-title">Profile Picture</div>
                <?php
                $image_path = $student['image_path'] ?? '';
                // Remove the "../public" prefix if it exists
                $display_path = str_replace("../public/", "../", $image_path);
                ?>
                <img src="<?= !empty($display_path) ? htmlspecialchars($display_path) : '../media/default-profile.png' ?>" 
                     alt="Profile Picture" class="profile-picture" id="profilePreview">
                <input type="file" id="profile-upload" name="profile_picture" accept="image/*" onchange="previewImage(this)">
                <button type="button" class="upload-btn" onclick="document.getElementById('profile-upload').click()">Change Photo</button>
            </div>

            <label for="student-number">Student ID</label>
            <input readonly type="text" id="student-number" name="student_number" 
                   value="<?= htmlspecialchars($student['student_number'] ?? '') ?>" 
                   placeholder="Enter your student number">

            <label for="first-name">First Name</label>
            <input readonly type="text" id="first-name" name="first_name" 
                   value="<?= htmlspecialchars($student['first_name'] ?? '') ?>" 
                   placeholder="Enter your first name">

            <label for="last-name">Last Name</label>
            <input readonly type="text" id="last-name" name="last_name" 
                   value="<?= htmlspecialchars($student['last_name'] ?? '') ?>" 
                   placeholder="Enter your last name">

            <label for="email">Email</label>
            <input readonly type="email" id="email" name="email" 
                   value="<?= htmlspecialchars($student['email'] ?? '') ?>" 
                   placeholder="Enter your email">

            <label for="program">Program</label>
            <input readonly type="text" id="program" name="program" 
                   value="<?= htmlspecialchars($student['program_name'] ?? '') ?>" 
                   placeholder="Your program">

            <label for="section">Section</label>
            <input readonly type="text" id="section" name="section" 
                   value="<?= htmlspecialchars($student['section_name'] ?? '') ?>" 
                   placeholder="Your section">

            <div class="button-container">
                <button type="submit">Save Changes</button>
                <button type="button" onclick="window.location.href='item-main.php'">Back</button>
            </div>
        </form>
    </div>

    <script>
        // Toggle Dropdown Menu
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("show");
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            var userProfile = document.querySelector('.user-profile');
            var dropdownMenu = document.getElementById("dropdownMenu");
            
            if (!userProfile.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });

        // Preview uploaded image
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>