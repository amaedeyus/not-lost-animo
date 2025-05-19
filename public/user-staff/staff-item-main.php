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
        
            <div class="header-container">
                <button type="button" class="add-button" onclick="window.location.href='staff-pending-item-main.php'"><img src="../media/search.png"> View Pending Submissions</button>
                <button type="button" class="add-button" onclick="window.location.href='staff-add-item.php'"><img src="../media/add.png"> Submit Lost Item</button>
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