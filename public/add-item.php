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

        <input type="file" name="image_path" accept="image/*" required>

        <label for="txtitemname">Item Name</label>
        <input type="text" name="item_name" id="txtitemname" value="<?= $vitemname ?>">

        <label for="txtdescription">Description</label>
        <input type="text" name="description" id="txtdescription" value="<?= $vdescription ?>">

        <label for="txtlostdate">Date Lost</label>
        <input type="date" name="lost_date" id="txtlostdate" value="<?= $vlostdate ?>">

        <label for="txtlostlocation">Where it was lost</label>
        <select name="lost_location" id="txtstatus">
            <option value="Sentrum" <?= $vlostlocation == "Sentrum" ? 'selected' : '' ?>>Sentrum</option>
        <option value="Capilla" <?= $vlostlocation == "Capilla" ? 'selected' : '' ?>>Capilla</option>
        <option value="CBEAM Building" <?= $vlostlocation == "CBEAM Building" ? 'selected' : '' ?>>CBEAM Building</option>
        <option value="Br. Benilde Building" <?= $vlostlocation == "Br. Benilde Building" ? 'selected' : '' ?>>Br. Benilde Building</option>
        <option value="JRN Building" <?= $vlostlocation == "JRN Building" ? 'selected' : '' ?>>JRN Building</option>
        <option value="JRF Building" <?= $vlostlocation == "JRF Building" ? 'selected' : '' ?>>JRF Building</option>
        <option value="Mabini Building" <?= $vlostlocation == "Mabini Building" ? 'selected' : '' ?>>Mabini Building</option>
        <option value="Retreat Complex" <?= $vlostlocation == "Retreat Complex" ? 'selected' : '' ?>>Retreat Complex</option>
        <option value="Chez Rafael" <?= $vlostlocation == "Chez Rafael" ? 'selected' : '' ?>>Chez Rafael</option>
        <option value="LRC" <?= $vlostlocation == "LRC" ? 'selected' : '' ?>>LRC</option>
        <option value="Jose Diokno Building" <?= $vlostlocation == "Jose Diokno Building" ? 'selected' : '' ?>>Jose Diokno Building</option>
        <option value="Sports Complex" <?= $vlostlocation == "Sports Complex" ? 'selected' : '' ?>>Sports Complex</option>
        <option value="Student Center" <?= $vlostlocation == "Student Center" ? 'selected' : '' ?>>Student Center</option>
        <option value="IT Domain" <?= $vlostlocation == "IT Domain" ? 'selected' : '' ?>>IT Domain</option>
        <option value="Centen Sports Plaza" <?= $vlostlocation == "Centen Sports Plaza" ? 'selected' : '' ?>>Centen Sports Plaza</option>
        <option value="Oval" <?= $vlostlocation == "Oval" ? 'selected' : '' ?>>Oval</option>
        <option value="College Lobby" <?= $vlostlocation == "College Lobby" ? 'selected' : '' ?>>College Lobby</option>

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
