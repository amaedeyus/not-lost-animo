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
    <link rel="icon" type="image/png" href="../media/dlsl.png">
    <link rel="stylesheet" href="../css/base.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/item-view.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/form-buttons.css?v=<?= time() ?>">
</head>
<body>

<header>
    <img src="../media/logo.png" alt="notlostanimo-logo" class="logo-img">
</header>

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
            <form method="post" action="approve-item.php">
                <input type="hidden" name="item_index" value="<?= $vitemindex ?>">
                <button type="submit" name="approve">Approve</button>
            </form>
            <button class="back-button" onclick="window.location.href='staff-pending-item-main.php'">Back</button>
        </div>
    
</div>

</body>
</html>