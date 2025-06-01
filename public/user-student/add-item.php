<?php require("../include/conn.php"); ?>
<?php require("get-user-info.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Lost Animo - Submit Item</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../media/dlsl.png">
    <link rel="stylesheet" href="../css/base.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/menu-bar.css?v=<?= time() ?>">
    <style>

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header .logo-img {
            height: 60px;
            width: auto;
        }

        /* User Profile Styles */
        .user-profile {
            position: relative;
            cursor: pointer;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 20px;
            margin-left: auto;
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

        form {
            width: 100%;
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
            max-width: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            width: 100%;
            margin-bottom: 15px;
            text-align: center;
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

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #124d2c;
            text-align: center;
        }

        input[type="text"],
        input[type="date"],
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
            text-align: center;
        }

        input[type="file"] {
            margin-bottom: 15px;
            width: 100%;
            text-align: center;
        }

        /* Custom file input styling */
        .file-input-container {
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
        }

        .file-input-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .file-input-button:hover {
            background-color: #388E3C;
        }

        #file-name-display {
            margin-top: 8px;
            font-size: 14px;
            color: #666;
        }

        .form-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
            width: 100%;
        }

        .form-buttons input[type="submit"],
        .form-buttons button {
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

        .form-buttons input[type="submit"]:hover,
        .form-buttons button:hover {
            background-color: #388E3C;
        }

        /* Ad Popup Styles */
        .ad-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            width: 90%;
            max-width: 800px;
            color: white;
        }

        .ad-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 999;
        }

        .ad-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
        }

        .ad-title {
            color: white;
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .close-ad {
            background: none;
            border: none;
            color: #666;
            font-size: 24px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .close-ad:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .ad-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .ad-video {
            width: 100%;
            max-width: 720px;
            border-radius: 4px;
            background: #000;
        }

        .ad-description {
            color: #ccc;
            margin: 10px 0;
            font-size: 14px;
            text-align: center;
        }

        /* Hide default file input */
        input[type="file"] {
            display: none;
        }
    </style>
</head>
<body>
<header>
    <img src="../media/logo.png" alt="notlostanimo-logo" class="logo-img">

    <div class="user-profile" onclick="toggleDropdown()">
        <span><?= $fullName ?></span>
        <div class="dropdown-content" id="dropdownMenu">
            <a href="profile.php">My Profile</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
</header>

    <h1 class="form-title">Submit a Lost Item</h1>
    <p class="form-subtitle">Please fill out the item information</p>

<div class="form-container">
    <form action="add-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
            <div class="form-group">
        <label for="image_path">Insert item image:</label>
                <div class="file-input-container">
                    <input type="file" name="image_path" id="image_path" accept="image/*" required>
                    <button type="button" class="file-input-button">Choose File</button>
                </div>
                <span id="file-name-display">No file chosen</span>
            </div>

            <div class="form-group">
        <label for="txtitemname">Item Name:</label>
                <input type="text" name="item_name" id="txtitemname" placeholder="Enter item name" required>
            </div>

            <div class="form-group">
        <label for="txtdescription">Description:</label>
                <input type="text" name="description" id="txtdescription" placeholder="Enter item description" required>
            </div>

            <div class="form-group">
        <label for="txtlostdate">When you found the item:</label>
                <input type="date" name="lost_date" id="txtlostdate" required>
            </div>

            <div class="form-group">
        <label for="txtlostlocation">Where you found the item:</label>
                <select name="lost_location" id="txtstatus" required>
                    <option value="">Select location</option>
                    <option value="Sentrum">Sentrum</option>
                    <option value="Capilla">Capilla</option>
                    <option value="CBEAM Building">CBEAM Building</option>
                    <option value="Br. Benilde Building">Br. Benilde Building</option>
                    <option value="JRN Building">JRN Building</option>
                    <option value="JRF Building">JRF Building</option>
                    <option value="Mabini Building">Mabini Building</option>
                    <option value="Retreat Complex">Retreat Complex</option>
                    <option value="Chez Rafael">Chez Rafael</option>
                    <option value="LRC">LRC</option>
                    <option value="Jose Diokno Building">Jose Diokno Building</option>
                    <option value="Sports Complex">Sports Complex</option>
                    <option value="Student Center">Student Center</option>
                    <option value="IT Domain">IT Domain</option>
                    <option value="Centen Sports Plaza">Centen Sports Plaza</option>
                    <option value="Oval">Oval</option>
                    <option value="College Lobby">College Lobby</option>
        </select>
            </div>
        
        <div class="form-buttons">
            <input type="submit" value="Save Record" />
                <button type="button" onclick="window.location.href='item-main.php'">Back</button>
        </div>
    </form>
</div>

    <div class="ad-overlay" id="adOverlay"></div>
    <div class="ad-popup" id="adPopup">
        <div class="ad-header">
            <h3 class="ad-title">Special Advertisement</h3>
            <button class="close-ad" onclick="closeAd()">×</button>
        </div>
        <div class="ad-content">
            <video class="ad-video" controls autoplay muted>
                <source src="../media/ads/cokevid1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <p class="ad-description">Enjoy this special message from our sponsor!</p>
        </div>
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

        // Date input validation
    const dateInput = document.getElementById("txtlostdate");
    const today = new Date();
    const minDate = `${today.getFullYear()}-05-15`;
    dateInput.min = minDate;

        // Ad popup functionality
        window.onload = function() {
            setTimeout(function() {
                document.getElementById('adOverlay').style.display = 'block';
                document.getElementById('adPopup').style.display = 'block';
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
        }

        // Close ad when clicking overlay
        document.getElementById('adOverlay').addEventListener('click', closeAd);

        // File input functionality
        const fileInput = document.getElementById("image_path");
        const fileButton = document.querySelector(".file-input-button");
        const fileNameDisplay = document.getElementById("file-name-display");

        fileInput.addEventListener("change", function() {
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = "No file chosen";
            }
        });

        fileButton.addEventListener("click", function() {
            fileInput.click();
        });
</script>
</body>
</html>
