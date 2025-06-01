<?php require("../include/conn.php"); ?>

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
        /* Header icon specific styles */
        header .logo-img {
            height: 60px;
            width: auto;
        }

        .add-button img {
            width: 13px;
            height: 13px;
            margin-right: 5px;
        }

        .header-container {
            display: flex;
            align-items: center;
            gap: 10px;
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

        .form-group {
            width: 100%;
            margin-bottom: 15px;
            text-align: center;
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

        select {
            appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right 8px center;
            background-size: 16px;
            padding-right: 30px;
            text-align-last: center;
        }

        /* Hide default file input */
        input[type="file"] {
            display: none;
        }

        /* User Profile Dropdown Styles */
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

        .dropdown-content.show {
            display: block;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <header>
        <img src="../media/logo.png" alt="notlostanimo-logo" class="logo-img">
        
        <div class="header-container">
            <button type="button" class="add-button" onclick="window.location.href='staff-pending-item-main.php'">
                <img src="../media/search.png"> View Pending Items
            </button>
            
            <!-- User Profile and Dropdown -->
            <div class="user-profile" onclick="toggleDropdown()">
                <span>☰</span>
                <div class="dropdown-content" id="dropdownMenu">
                    <a href="staff-logout.php">Log Out</a>
                </div>
            </div>
        </div>
    </header>

    <h1 class="form-title">Submit a Lost Item</h1>
    <p class="form-subtitle">Please fill out the item information</p>

    <div class="form-container">
        <form action="staff-add-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
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
                <button type="button" onclick="window.location.href='staff-item-main.php'">Back</button>
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

        // Date input validation
        const dateInput = document.getElementById("txtlostdate");
        const today = new Date();
        const minDate = `${today.getFullYear()}-05-15`;
        dateInput.min = minDate;

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
