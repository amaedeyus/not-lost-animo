<?php require("../include/conn.php"); ?>
<?php require("get-user-info.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Lost Animo</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito  :wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../media/dlsl.png">
    <link rel="stylesheet" href="../css/base.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/item-main.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/menu-bar.css?v=<?= time() ?>">
    <style>
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
        
        <button type="button" class="add-button" onclick="window.location.href='add-item.php'"><img src="../media/add.png"> Submit Lost Item</button>

        <!-- User Profile and Dropdown -->
        <div class="user-profile" onclick="toggleDropdown()">
            <span><?= $fullName ?></span>
            <div class="dropdown-content" id="dropdownMenu">
                <a href="profile.php">My Profile</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </header>

<div class="content">

    <form action="" method="get" name="filterForm" enctype="multipart/form-data" class="filter" novalidate>
        <input type="hidden" name="q" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
            <select name="status_filter" onchange="this.form.submit()">
                <option value="">-- Filter by Status --</option>
                <option value="Lost" <?= (isset($_GET['status_filter']) && $_GET['status_filter'] == 'Lost') ? 'selected' : '' ?>>Lost</option>
                <option value="Found" <?= (isset($_GET['status_filter']) && $_GET['status_filter'] == 'Found') ? 'selected' : '' ?>>Found</option>
            </select>
    </form>


<div class="records-container">
        <?php

             // Pagination setup
            $itemsPerPage = 25;
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($currentPage - 1) * $itemsPerPage;

            $statusFilter = isset($_GET['status_filter']) ? $_GET['status_filter'] : '';
            $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

            $sql = "SELECT * FROM item_submission WHERE approved = 1 AND status IN ('Lost', 'Returned')";
            $params = [];
            $types = "";

            // Append filters
            if (!empty($statusFilter)) {
                $sql .= " AND status = ?";
                $params[] = $statusFilter;
                $types .= "s";
            }
            if (!empty($searchQuery)) {
                $sql .= " AND (description LIKE ? OR item_name LIKE ? OR lost_date LIKE ? OR lost_location LIKE ? OR item_index LIKE ?)";
                $searchWildcard = "%$searchQuery%";
                $params[] = $searchWildcard;
                $params[] = $searchWildcard;
                $params[] = $searchWildcard;
                $params[] = $searchWildcard;
                $params[] = $searchWildcard;
                $types .= "sssss";
            }

            $sql .= " ORDER BY item_index DESC LIMIT ?, ?";
            $params[] = $offset;
            $params[] = $itemsPerPage;
            $types .= "ii";

            $stmt = $conn->prepare($sql);

            // Bind parameters dynamically
            if (!empty($params)) {
                $stmt->bind_param($types, ...$params);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    $vitemindex = htmlspecialchars($row['item_index']);
                    $vitemname = htmlspecialchars($row['item_name']);

                        $fullDescription = htmlspecialchars($row['description']);
                        $vdescription = mb_strimwidth($fullDescription, 0, 100, '...');

                        $rawDate = $row['lost_date'];
                        $vlostdate = date("F j, Y", strtotime($rawDate));

                    $vimagepath = htmlspecialchars($row['image_path']);
                        
                    $vlostlocation = htmlspecialchars($row['lost_location']);
                    $vstatus = htmlspecialchars($row['status']);
        ?>
        <div class="record-panel">
            <div class="img-container">
            <?php
                $imageFullPath = '../media/' . $vimagepath;
                if (!empty($vimagepath) && file_exists($imageFullPath)) {
                    echo "<img src='{$imageFullPath}' alt='Item Image' class='item-image'>";
                } else {
                    echo "<p><em>No image available</em></p>";
                }
            ?>
            </div>

            <div><strong>Item:</strong> <?= $vitemindex ?></div>
            <div><strong>Description:</strong> <?= $vdescription ?></div>
            <div><strong>Date Lost:</strong> <?= $vlostdate ?></div>
            <div><strong>Where it was lost:</strong> <?= $vlostlocation ?></div>
            <div><strong>Status:</strong> <?= $vstatus ?></div>
            <div class="record-buttons">
                <button class="btn" onclick="window.location.href='item-view.php?vid=<?= $vitemindex ?>'">View</button>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p>No items found.</p>
    <?php endif; ?>
    </div>

    <!-- Pagination Controls -->
<?php
// Get the total number of items
$totalSql = "SELECT COUNT(*) AS total FROM item_submission WHERE 1=1";
$totalParams = [];
$totalTypes = "";

// Apply filters for the total count query
if (!empty($statusFilter)) {
    $totalSql .= " AND status = ?";
    $totalParams[] = $statusFilter;
    $totalTypes .= "s";
}
if (!empty($searchQuery)) {
    $totalSql .= " AND (description LIKE ? OR item_name LIKE ? OR lost_date LIKE ? OR lost_location LIKE ? OR item_index LIKE ?)";
    $totalWildcard = "%$searchQuery%";
    $totalParams[] = $totalWildcard;
    $totalParams[] = $totalWildcard;
    $totalParams[] = $totalWildcard;
    $totalParams[] = $totalWildcard;
    $totalParams[] = $totalWildcard;
    $totalTypes .= "sssss";
}

// Execute total query with filters
$totalStmt = $conn->prepare($totalSql);
if (!empty($totalParams)) {
    $totalStmt->bind_param($totalTypes, ...$totalParams);
}

$totalStmt->execute();
$totalResult = $totalStmt->get_result();
$totalRow = $totalResult->fetch_assoc();
$totalItems = $totalRow['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Display pagination
if ($totalPages > 1) {
    echo '<div class="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i" . (isset($_GET['q']) ? '&q=' . urlencode($_GET['q']) : '') . (isset($_GET['status_filter']) ? '&status_filter=' . urlencode($_GET['status_filter']) : '') . "'>$i</a> ";
    }
    echo '</div>';
}
?>

</div>

<!-- Ad Popup -->
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
</script>
</body>
</html>