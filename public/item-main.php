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

            $sql = "SELECT * FROM item_submission WHERE 1=1";
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

            $sql .= " ORDER BY submission_index";
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
                        
                    $vlostlocation = htmlspecialchars($row['lost_location']);
                    $vstatus = htmlspecialchars($row['status']);
        ?>
        <div class="record-panel">
            <div><strong>Item:</strong> <?= $vitemindex ?></div>
            <div><strong>Description:</strong> <?= $vdescription ?></div>
            <div><strong>Date Lost:</strong> <?= $vlostdate ?></div>
            <div><strong>Where it was lost:</strong> <?= $vlostlocation ?></div>
            <div><strong>Status:</strong> <?= $vstatus ?></div>
            <div class="record-buttons">
                <button class="btn" onclick="window.location.href='delete.php?vid=<?= $vitemindex ?>'">View</button>
            </div>
        </div>
        <?php endwhile; else: ?>
        <p>No items found.</p>
    <?php endif; ?>
    </div>
</div>



</body>
</html>