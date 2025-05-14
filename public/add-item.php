<?php require("../include/conn.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Item</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/add-item.css">
</head>
<body>

<header>
</header>

<div class="form-container">
    <h2>Insert Item</h2>
    <p>Please fill out the item information</p>

    <?php
    $vitemname = "";
    $vdescription = "";
    $vlostdate = "";
    $vlostlocation = "";
    $vstatus = "";
    ?>

    <form action="add-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
        <label for="txtitemname">Item Name</label>
        <input type="text" name="item_name" id="txtitemname" value="<?= $vitemname ?>">

        <label for="txtdescription">Description</label>
        <input type="text" name="description" id="txtdescription" value="<?= $vdescription ?>">

        <label for="txtlostdate">Date Lost</label>
        <input type="date" name="lost_date" id="txtlostdate" value="<?= $vlostdate ?>">

        <label for="txtlostlocation">Where it was lost</label>
        <select name="lost_location" id="txtstatus">
            <option value="Main Building" <?= $vlostlocation == "Main Building" ? 'selected' : '' ?>>Main Building</option>
            <option value="Library" <?= $vlostlocation == "Library" ? 'selected' : '' ?>>Library</option>
            <option value="Gym" <?= $vlostlocation == "Gym" ? 'selected' : '' ?>>Gym</option>
            <option value="Canteen" <?= $vlostlocation == "Canteen" ? 'selected' : '' ?>>Canteen</option>
            <option value="Classroom" <?= $vlostlocation == "Classroom" ? 'selected' : '' ?>>Classroom</option>
        </select>
        

        <label for="txtstatus">Status</label>
        <select name="status" id="txtstatus">
            <option value="Lost" <?= $vstatus == "Lost" ? 'selected' : '' ?>>Lost</option>
            <option value="Found" <?= $vstatus == "Found" ? 'selected' : '' ?>>Found</option>
        </select>

        <div class="form-buttons">
            <input type="submit" value="Save Record" />
            <button type="button" class="back-button" onclick="window.location.href='item-main.php'">Back</button>
        </div>
    </form>
</div>


<script>
    const dateInput = document.getElementById("txtlostdate");

    const today = new Date();
    const minDate = `${today.getFullYear()}-05-15`;

    dateInput.min = minDate;
</script>

</body>
</html>
