<?php require("../include/conn.php"); ?>
<?php require("get-user-info.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Not Lost Animo</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="../media/dlsl.png" />
    <link rel="stylesheet" href="../css/base.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../css/header.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../css/item-main.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../css/menu-bar.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../css/ads.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="../css/banner.css?v=<?= time() ?>" />
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
            margin-left: auto;
        }
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
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
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
</head>
<body>
    <header>
        <img src="../media/logo.png" alt="notlostanimo-logo" class="logo-img" />

        <form action="" method="get" name="formadd" enctype="multipart/form-data" novalidate>
            <div class="search-wrapper">
                <input
                    type="search"
                    id="txtsearch"
                    name="q"
                    placeholder="Search..."
                    value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>"
                />
                <button type="submit"><img src="../media/search.png" alt="Search" /></button>
            </div>
        </form>

        <button type="button" class="add-button" onclick="window.location.href='add-item.php'">
            <img src="../media/add.png" alt="Add" /> Submit Lost Item
        </button>

        <div class="user-profile" onclick="toggleDropdown()">
            <span><?= htmlspecialchars($fullName) ?></span>
            <div class="dropdown-content" id="dropdownMenu">
                <a href="profile.php">My Profile</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </header>

    <div id="introPopup" class="intro-popup">
    <div class="intro-content">
        <h2>Welcome to Not Lost Animo!</h2>
        <p>This platform helps you report and find lost items around campus.</p>
        <button onclick="closeIntro()">Got it!</button>
    </div>
</div>


    <div class="top-banner" id="topBanner">
        <img src="../media/ads/cokegif.gif" alt="Coca-Cola Banner" />
        <button class="close-banner" onclick="closeBanner()">×</button>
    </div>

    <div class="right-banner" id="rightBanner">
        <img src="../media/ads/cokebanner2.jpg" alt="Coca-Cola Right Banner" />
        <button class="close-right-banner" onclick="closeRightBanner()">×</button>
    </div>

    <div class="content">
        <form action="" method="get" name="filterForm" enctype="multipart/form-data" class="filter" novalidate>
            <input type="hidden" name="q" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>" />
            <select name="status_filter" onchange="this.form.submit()">
                <option value="">-- Filter by Status --</option>
                <option value="Lost" <?= (isset($_GET['status_filter']) && $_GET['status_filter'] === 'Lost') ? 'selected' : '' ?>>Lost</option>
                <option value="Returned" <?= (isset($_GET['status_filter']) && $_GET['status_filter'] === 'Returned') ? 'selected' : '' ?>>Returned</option>
            </select>
        </form>

        <div class="records-container">
            <?php
            // Pagination setup
            $itemsPerPage = 25;
            $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
            $offset = ($currentPage - 1) * $itemsPerPage;

            $statusFilter = isset($_GET['status_filter']) ? $_GET['status_filter'] : '';
            $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

            // Build the SQL with approved=1 AND status IN ('Lost', 'Returned')
            $sql = "SELECT * FROM item_submission WHERE approved = 1 AND status IN ('Lost', 'Returned')";
            $params = [];
            $types = "";

            if (!empty($statusFilter)) {
                $sql .= " AND status = ?";
                $params[] = $statusFilter;
                $types .= "s";
            }
            if (!empty($searchQuery)) {
                $sql .= " AND (description LIKE ? OR item_name LIKE ? OR lost_date LIKE ? OR lost_location LIKE ? OR item_index LIKE ?)";
                $searchWildcard = "%$searchQuery%";
                $params = array_merge($params, [$searchWildcard, $searchWildcard, $searchWildcard, $searchWildcard, $searchWildcard]);
                $types .= "sssss";
            }

            $sql .= " ORDER BY item_index DESC LIMIT ?, ?";
            $params[] = $offset;
            $params[] = $itemsPerPage;
            $types .= "ii";

            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                echo "Database prepare error: " . htmlspecialchars($conn->error);
                exit;
            }

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
                        echo "<img src='" . htmlspecialchars($imageFullPath) . "' alt='Item Image' class='item-image' />";
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
        // Total count query
        $totalSql = "SELECT COUNT(*) AS total FROM item_submission WHERE approved = 1 AND status IN ('Lost', 'Returned')";
        $totalParams = [];
        $totalTypes = "";

        if (!empty($statusFilter)) {
            $totalSql .= " AND status = ?";
            $totalParams[] = $statusFilter;
            $totalTypes .= "s";
        }
        if (!empty($searchQuery)) {
            $totalSql .= " AND (description LIKE ? OR item_name LIKE ? OR lost_date LIKE ? OR lost_location LIKE ? OR item_index LIKE ?)";
            $totalWildcard = "%$searchQuery%";
            $totalParams = array_merge($totalParams, [$totalWildcard, $totalWildcard, $totalWildcard, $totalWildcard, $totalWildcard]);
            $totalTypes .= "sssss";
        }

        $totalStmt = $conn->prepare($totalSql);
        if ($totalStmt === false) {
            echo "Database prepare error: " . htmlspecialchars($conn->error);
            exit;
        }

        if (!empty($totalParams)) {
            $totalStmt->bind_param($totalTypes, ...$totalParams);
        }

        $totalStmt->execute();
        $totalResult = $totalStmt->get_result();
        $totalRow = $totalResult->fetch_assoc();
        $totalItems = (int)$totalRow['total'];
        $totalPages = ceil($totalItems / $itemsPerPage);

        if ($totalPages > 1):
        ?>
            <div class="pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i++):
                    $queryParams = [];
                    if (!empty($searchQuery)) $queryParams['q'] = $searchQuery;
                    if (!empty($statusFilter)) $queryParams['status_filter'] = $statusFilter;
                    $queryParams['page'] = $i;
                    $url = '?' . http_build_query($queryParams);
                ?>
                    <a href="<?= htmlspecialchars($url) ?>" <?= $i === $currentPage ? 'class="active"' : '' ?>><?= $i ?></a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

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
                allowfullscreen>
            </iframe>
            <p class="ad-description">Enjoy this special message from our sponsor!</p>
        </div>
    </div>

    <script>

        document.querySelector('a[href="logout.php"]').addEventListener("click", function (e) {
    // Clear sessionStorage before redirecting
    sessionStorage.removeItem("introShown");
});


        window.addEventListener("load", function () {
    if (!sessionStorage.getItem("introShown")) {
        document.getElementById("introPopup").style.display = "block";
        sessionStorage.setItem("introShown", "true");
    }
});

function closeIntro() {
    document.getElementById("introPopup").style.display = "none";
}
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

        // Advertisement popup logic
        const adUrls = [
            "https://www.youtube.com/embed/kpHBxLqkikw?autoplay=1&mute=1",
            "https://www.youtube.com/embed/gQ1b0uaFRjM?autoplay=1&mute=1",
            "https://www.youtube.com/embed/ZCJTeWsbSio?autoplay=1&mute=1",
            "https://www.youtube.com/embed/fdxvsyr_X3c?autoplay=1&mute=1",
            "https://www.youtube.com/embed/Ec0Z1v7jKDQ?autoplay=1&mute=1"
        ];

        window.onload = function () {
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
};

        function closeAd() {
            document.getElementById('adOverlay').style.display = 'none';
            document.getElementById('adPopup').style.display = 'none';
            document.getElementById('adIframe').src = "";
        }

        function closeBanner() {
            document.getElementById('topBanner').style.display = 'none';
        }

        function closeRightBanner() {
            document.getElementById('rightBanner').style.display = 'none';
        }
    </script>
</body>
</html>
