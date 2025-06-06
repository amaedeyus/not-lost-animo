<?php require("../include/conn.php"); ?>
<?php require("get-user-info.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Not Lost Animo - Submit Item</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="../media/dlsl.png" />
    <link rel="stylesheet" href="../css/base.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../css/header.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../css/menu-bar.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../css/ads.css?v=<?= time() ?>" />
    <style>
        /* Your existing CSS styles remain unchanged */
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
            font-family: 'Nunito', sans-serif;
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #124d2c;
            text-align: center;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px 14px;
            border: none;
            border-radius: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            box-sizing: border-box;
            font-size: 15px;
            text-align: center;
            font-family: 'Nunito', sans-serif;
        }

        /* Select with custom arrow */
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 16px;
            padding-right: 36px;
            text-align-last: center;
        }

        input[type="file"] {
            display: none;
        }

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
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
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
            padding: 10px 25px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 30px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            font-family: 'Nunito', sans-serif;
        }

        .form-buttons input[type="submit"]:hover,
        .form-buttons button:hover {
            background-color: #388E3C;
        }

        .top-banner {
            width: 100%;
            background-color: #fff;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
        }

        .top-banner img {
            max-width: 50%;
            height: auto;
        }

        .close-banner {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
            padding: 5px 10px;
        }

        .close-banner:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="top-banner" id="topBanner">
        <img src="../media/ads/cokebanner1.png" alt="Coca-Cola Banner" />
        <button class="close-banner" onclick="closeBanner()">×</button>
    </div>
    <header>
        <img src="../media/logo.png" alt="notlostanimo-logo" class="logo-img" />

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
        <form action="add-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate id="itemForm">
            <div class="form-group">
                <label for="image_path">Insert item image:</label>
                <div class="file-input-container">
                    <input type="file" name="image_path" id="image_path" accept="image/*" required />
                    <button type="button" class="file-input-button">Choose File</button>
                </div>
                <span id="file-name-display">No file chosen</span>
            </div>

            <div class="form-group">
                <label for="txtitemname">Item Name:</label>
                <input type="text" name="item_name" id="txtitemname" placeholder="Enter item name" required />
            </div>

            <div class="form-group">
                <label for="txtdescription">Description:</label>
                <input type="text" name="description" id="txtdescription" placeholder="Enter item description" required />
            </div>

            <div class="form-group">
    <label for="txtlostdate">When you found the item:</label>
    <input type="date" name="lost_date" id="txtlostdate" max="<?= date('Y-m-d') ?>" required />
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
                <input type="submit" value="Submit Item" />
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
            <iframe
                id="adIframe"
                width="560"
                height="315"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
            <p class="ad-description">Enjoy this special message from our sponsor!</p>
        </div>
    </div>

<script>
    // Toggle Dropdown Menu
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("show");
    }

    // Close dropdown if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('.user-profile')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    };

    // File input custom button
    const fileInput = document.getElementById('image_path');
    const fileInputButton = document.querySelector('.file-input-button');
    const fileNameDisplay = document.getElementById('file-name-display');

    fileInputButton.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = "No file chosen";
        }
    });

    // Close banner function
    function closeBanner() {
        document.getElementById("topBanner").style.display = "none";
    }

    // Form validation on submit
    document.getElementById('itemForm').onsubmit = function() {
        return validateForm();
    };

    function validateForm() {
        const imageInput = document.getElementById('image_path');
        const itemName = document.getElementById('txtitemname').value.trim();
        const description = document.getElementById('txtdescription').value.trim();
        const lostDate = document.getElementById('txtlostdate').value.trim();
        const lostLocation = document.getElementById('txtstatus').value.trim();

        if (imageInput.files.length === 0) {
            alert("Please choose an item image.");
            imageInput.focus();
            return false;
        }

        if (itemName === "") {
            alert("Please enter the item name.");
            document.getElementById('txtitemname').focus();
            return false;
        }

        if (description === "") {
            alert("Please enter a description.");
            document.getElementById('txtdescription').focus();
            return false;
        }

        if (lostDate === "") {
            alert("Please select the date when you found the item.");
            document.getElementById('txtlostdate').focus();
            return false;
        }

        if (lostLocation === "") {
            alert("Please select where you found the item.");
            document.getElementById('txtstatus').focus();
            return false;
        }

        return true;
    }
</script>
</body>
</html>
