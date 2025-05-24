<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="cgcc2.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/form.css">
    <base href="Media/">
    <title>CGCC - Edit Profile</title>
    <style>
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 20px;
            width: 150px; /* Fixed width to match image size */
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
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            width: 100%; /* Make button full width of container */
            text-align: center; /* Center text within button */
        }
        .upload-btn:hover {
            background: #45a049;
        }
        #profile-upload {
            display: none;
        }
        .profile-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">
            <img src="cgcc.png" alt="cgcc-logo" class="logo-img">
            College Guidance and Counseling Center
        </div>
        <nav class="navigation">
            <a href="../main.html">Home</a>
            <a href="#">Contact</a>
            <a href="#">About Mental Health</a>
            <a href="#">FAQ</a>
        </nav>
    </header>

    <h1 class="form-title">Edit Profile</h1>
    <p class="form-subtitle">Update your profile information</p>

    <section class="form-container">
        <form>
            <div class="profile-section">
                <div class="profile-title">Profile Picture</div>
                <img src="default-profile.png" alt="Profile Picture" class="profile-picture" id="profile-picture">
                <input type="file" id="profile-upload" accept="image/*">
                <button type="button" class="upload-btn" onclick="document.getElementById('profile-upload').click()">Upload Photo</button>
            </div>

            <label for="student-id">Student ID</label>
            <input type="text" id="student-id" placeholder="Ex. 2023345231">

            <label for="first-name">First Name</label>
            <input type="text" id="first-name" placeholder="Ex. John">

            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" placeholder="Ex. Dela Cerna">

            <label>Year Level</label>
            <div class="radio-group">
                <label><input type="radio" name="year"> 1st Year</label>
                <label><input type="radio" name="year"> 2nd Year</label>
                <label><input type="radio" name="year"> 3rd Year</label>
                <label><input type="radio" name="year"> 4th Year</label>
                <label><input type="radio" name="year"> 5th Year</label>
            </div>

            <label for="program">Program</label>
            <select id="program">
                <option>AB Communication</option>
                <option>Associate in Computer Technology</option>
                <option>Bachelor of Elementary Education</option>
                <option>Bachelor of Multimedia Arts</option>
                <option>BS Biology</option>
                <option>BS Education - English</option>
                <option>BS Education - Filipino</option>
                <option>BS Education - Math</option>
                <option>BS Education - Science</option>
                <option>BS Psychology</option>
                <option>BS Accounting</option>
                <option>BS Accounting Information System</option>
                <option>BS Business Administration (Financial Management)</option>
                <option>BS Business Administration (Marketing Management)</option>
                <option>BS Entrepreneurship</option>
                <option>BS Legal Management</option>
                <option>BS Nursing</option>
                <option>Certificate in Culinary Arts</option>
                <option>BS Hospitality Management</option>
                <option>BS Tourism Management</option>
                <option>BS Architecture</option>
                <option>BS Computer Engineering</option>
                <option>BS Computer Science</option>
                <option>BS Electronics Enginerring</option>
                <option>BS Electrical Engineering</option>
                <option>BS Entertainment and Multimedia Computing (EMC)</option>
                <option>BS Industrial Engineering</option>
                <option>BS Information Technology</option>
                <option>BS Forensic Science</option>
                <option>Certificate in ENTREP</option>
                <option>Master of Business Administration</option>
                <option>Juris Doctor</option>
                <option>Masters in Management Technology</option>
            </select>

            <div class="button-container">
                <button type="submit">Save Changes</button>
            </div>
        </form>
    </section>

    <script>
        // Preview image when uploaded
        document.getElementById('profile-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('profile-picture').src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    
</body>
</html>