<?php require("../include/conn.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Lost Animo</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../media/dlsl.png">
    <link rel="stylesheet" href="../css/base.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/staff-main.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/ads.css?v=<?= time() ?>">
</head>
<body>

 <style>
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #3b813e;
            box-shadow: inset 0px -5px 20px 30px rgba(27, 115, 40, 0.552);
        }

        .logo-img {
            height: 60px;
        }

        .search-wrapper {
            width: 400px;
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

        .header-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .intro-popup {
    display: none;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
}

.intro-content {
    background: #f0fdf4; /* soft light green background */
    padding: 30px;
    border-radius: 12px;
    max-width: 400px;
    text-align: center;
    margin: 15% auto;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    color: #064e3b; /* dark green text */
    font-family: Arial, sans-serif;
}

.intro-content h1 {
    color: #064e3b; /* dark green */
    font-weight: bold;
}

.intro-content strong {
    color: #064e3b;
}

.intro-content p {
    color: #15803d; /* medium green for names */
    margin: 4px 0;
}

.intro-content button,
.intro-content .get-started {
    background-color: #34d399; /* teal/green button */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

.intro-content button:hover,
.intro-content .get-started:hover {
    background-color: #10b981; /* darker teal on hover */
}
    </style>

    <header>
        <div style="display: flex; align-items: center; gap: 20px;">
            <img src="../media/logo.png" alt="notlostanimo-logo" class="logo-img">
            <form action="" method="get" name="formadd" enctype="multipart/form-data" novalidate>
                <div class="search-wrapper">
                    <input type="search" id="txtsearch" name="q" placeholder="Search..." 
                    value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
                    <button type="submit"><img src="../media/search.png"></button>
                </div>
            </form>
        </div>
        
        <div class="header-container">
            <button type="button" class="add-button" onclick="window.location.href='staff-pending-item-main.php'">
                <img src="../media/search.png"> View Pending Submissions
            </button>
            <button type="button" class="add-button" onclick="window.location.href='staff-add-item.php'">
                <img src="../media/add.png"> Submit Lost Item
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

     <div id="introPopup" class="intro-popup">
    <div class="intro-content">
        <h2>Welcome to Not Lost Animo!</h2>
        <p>You may view pending item submissions and update their status.</p>
        <button onclick="closeIntro()">Alright!</button>
    </div>
</div>

    <script>

        document.querySelector('a[href="staff-logout.php"]').addEventListener("click", function (e) {
    // Clear sessionStorage before redirecting
    sessionStorage.removeItem("introShown");
});

function closeIntro() {
    document.getElementById("introPopup").style.display = "none";
}


        window.addEventListener("load", function () {
    if (!sessionStorage.getItem("introShown")) {
        document.getElementById("introPopup").style.display = "block";
        sessionStorage.setItem("introShown", "true");
    }
});
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

    window.addEventListener("load", function () {
    // Show intro popup once per session
    if (!sessionStorage.getItem("introShown")) {
        document.getElementById("introPopup").style.display = "block";
        sessionStorage.setItem("introShown", "true");
    }

    // Ad popup logic
    const adUrls = [
        "https://www.youtube.com/embed/kpHBxLqkikw?autoplay=1&mute=1",
        "https://www.youtube.com/embed/gQ1b0uaFRjM?autoplay=1&mute=1",
        "https://www.youtube.com/embed/ZCJTeWsbSio?autoplay=1&mute=1",
        "https://www.youtube.com/embed/fdxvsyr_X3c?autoplay=1&mute=1",
        "https://www.youtube.com/embed/Ec0Z1v7jKDQ?autoplay=1&mute=1"
    ];

    let i = sessionStorage.getItem('adViewsLeft');

    if (i === null) {
        i = 10;
    } else {
        i = parseInt(i);
    }

    if (i > 0) {
        setTimeout(function () {
            const randomIndex = Math.floor(Math.random() * adUrls.length);
            document.getElementById('adIframe').src = adUrls[randomIndex];
            document.getElementById('adOverlay').style.display = 'block';
            document.getElementById('adPopup').style.display = 'block';

            i--;
            sessionStorage.setItem('adViewsLeft', i);
        }, 3000);
    }
});


    function closeAd() {
        var iframe = document.getElementById('adIframe');
        iframe.src = ""; // Clear video source
        document.getElementById('adOverlay').style.display = 'none';
        document.getElementById('adPopup').style.display = 'none';
    }

    document.getElementById('adOverlay').addEventListener('click', closeAd);
    </script>

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
            allowfullscreen>
        </iframe>
        <p class="ad-description">Enjoy this special message from our sponsor!</p>
    </div>
</div>


    </div>

<div class="content">

    <form action="" method="get" name="filterForm" enctype="multipart/form-data" class="filter" novalidate>
        <input type="hidden" name="q" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
            <select name="status_filter" onchange="this.form.submit()">
                <option value="">-- Filter by Status --</option>
                <option value="Lost" <?= (isset($_GET['status_filter']) && $_GET['status_filter'] == 'Lost') ? 'selected' : '' ?>>Lost</option>
                <option value="Returned" <?= (isset($_GET['status_filter']) && $_GET['status_filter'] == 'Returned') ? 'selected' : '' ?>>Returned</option>
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
                <button class="btn" onclick="window.location.href='staff-item-view.php?vid=<?= $vitemindex ?>'">View</button>
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



</body>
</html>