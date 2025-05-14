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
    $vcolor = "";
    $vbrand = "";
    $vstatus = "";
    ?>

    <form action="add-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
        <label for="txtstudentnumber">Item Name</label>
        <input type="text" name="txtstudentnumber" id="txtstudentnumber" value="<?= $vitemname ?>">

        <label for="txtlastname">Description</label>
        <input type="text" name="txtlastname" id="txtlastname" value="<?= $vdescription ?>">

        <label for="txtfirstname">Color</label>
        <input type="text" name="txtfirstname" id="txtfirstname" value="<?= $vcolor ?>">

        <label for="txtmiddlename">Brand</label>
        <input type="text" name="txtmiddlename" id="txtmiddlename" value="<?= $vbrand ?>">

        <label for="txtstatus">Status</label>
        <select name="txtstatus" id="txtstatus">
            <option value="Lost">Lost</option>
            <option value="Found">Found</option>
        </select>

        <div class="form-buttons">
            <input type="submit" value="Save Record" />
            <button type="button" class="back-button" onclick="window.location.href='item-main.php'">Back</button>
        </div>
    </form>
</div>

</body>
</html>
