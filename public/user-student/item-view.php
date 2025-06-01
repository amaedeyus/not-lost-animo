<?php require("../include/conn.php");
$vitemindex = $_REQUEST['vid'];

$sql = "SELECT * FROM item_submission where item_index='$vitemindex'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc())
    {
        $vitemindex = htmlspecialchars($row['item_index']);
        $vitemname = htmlspecialchars($row['item_name']);

            $fullDescription = htmlspecialchars($row['description']);
            $vdescription = mb_strimwidth($fullDescription, 0, 100, '...');

            $rawDate = $row['lost_date'];
            $vlostdate = date("F j, Y", strtotime($rawDate));

        $vimagepath = htmlspecialchars($row['image_path']);
            
        $vlostlocation = htmlspecialchars($row['lost_location']);
        $vstatus = htmlspecialchars($row['status']);
        }   
    }   
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Lost Animo</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="media/dlsl.png">
    <link rel="stylesheet" href="../css/base.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/item-view.css?v=<?= time() ?>">
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
</head>
<body>

<header>
    <img src="../media/logo.png" alt="notlostanimo-logo" class="logo-img">
</header>

<div class="top-banner" id="topBanner">
    <img src="../media/ads/cokegif.gif" alt="Coca-Cola Banner">
    <button class="close-banner" onclick="closeBanner()">×</button>
</div>

<div class="right-banner" id="rightBanner">
    <img src="../media/ads/cokebanner2.jpg" alt="Coca-Cola Right Banner">
    <button class="close-right-banner" onclick="closeRightBanner()">×</button>
</div>

<div class="container">

<center>
<div class="img-container">
    <?php
        $imageFullPath = '../media/' . $vimagepath;
        if (!empty($vimagepath) && file_exists($imageFullPath)) {
            echo "<img src='{$imageFullPath}' alt='Item Image'>";
        } else {
            echo "<p><em>No image available</em></p>";
        }
    ?>
    </div>
</center>


        <label for="txtitemname">Item Name</label>
        <input type="hidden" name="item_index" value="<?= $vitemindex ?>">  
        <input readonly type="text" name="item_name" id="txtitemname" value="<?php echo $vitemname; ?>">

        <label for="txtdescription">Description</label>
        <input readonly type="text" name="description" id="txtdescription" value="<?php echo $vdescription; ?>">

        <label for="txtlostdate">Date Lost</label>
        <input readonly type="text" name="lost_date" id="txtlostdate" value="<?php echo $vlostdate; ?>">

        <label for="txtlostlocation">Where it was lost</label>
        <input readonly type="text" name="lost_location" id="txtlostlocation" value="<?php echo $vlostlocation; ?>">
        

        <label for="txtstatus">Status</label>
        <input readonly type="text" name="status" id="txtstatus" value="<?php echo $vstatus; ?>">

        <div class="form-buttons">  
            <button type="button" class="back-button" onclick="window.location.href='item-main.php'">Back</button>
        </div>
    
</div>

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

</body>
</html>