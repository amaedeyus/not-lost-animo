<?php require("../include/conn.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Lost Animo</title>
    <link rel="icon" type="image/png" href="media/dlsl.png">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/item-main.css">
</head>
<body>
    <header>
        <form action="" method="get" name="formadd" enctype="multipart/form-data" novalidate>
            <input type="search" id="txtsearch" name="q" placeholder="🔍Search..." value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
        </form>
        
        <button type="button" class="btn" onclick="window.location.href='add-item.php'">+ Add Item</button>

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
            $statusFilter = isset($_GET['status_filter']) ? $_GET['status_filter'] : '';
            $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

            $sql = "SELECT * FROM item_description WHERE 1=1";
            $params = [];
            $types = "";

            // Append filters
            if (!empty($statusFilter)) {
                $sql .= " AND status = ?";
                $params[] = $statusFilter;
                $types .= "s";
            }
            if (!empty($searchQuery)) {
                $sql .= " AND (name LIKE ? OR description LIKE ? OR color LIKE ?)";
                $searchWildcard = "%$searchQuery%";
                $params[] = $searchWildcard;
                $params[] = $searchWildcard;
                $params[] = $searchWildcard;
                $types .= "sss";
            }

            $sql .= " ORDER BY item_index DESC";
            $stmt = $conn->prepare($sql);

            // Bind parameters dynamically
            if (!empty($params)) {
                $stmt->bind_param($types, ...$params);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    $vitemname = htmlspecialchars($row['name']);
                    $vdescription = htmlspecialchars($row['description']);
                    $vcolor = htmlspecialchars($row['color']);
                    $vbrand = htmlspecialchars($row['brand']);
                    $vstatus = htmlspecialchars($row['status']);
        ?>
        <div class="record-panel">
            <div><strong>Item:</strong> <?= $vitemname ?></div>
            <div><strong>Description:</strong> <?= $vdescription ?></div>
            <div><strong>Color:</strong> <?= $vcolor ?></div>
            <div><strong>Status:</strong> <?= $vstatus ?></div>
            <div class="record-buttons">
                <button class="btn" onclick="window.location.href='delete.php?vid=<?= $vitemname ?>'">View</button>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p>No items found.</p>
    <?php endif; ?>
    </div>
</div>



</body>
</html>