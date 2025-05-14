<?php
require("../include/conn.php");

$vitemname = $_POST['item_name'];
$vdescription = $_POST['description'];
$vlostdate = $_POST['lost_date'];
$vlostlocation = $_POST['lost_location'];
$vstatus = $_POST['status'];
$vimagepath = ''; // You can set this if you have a file upload field

$sql = "INSERT INTO item_submission (item_name, description, lost_date, lost_location, image_path, status)
        VALUES ('$vitemname', '$vdescription', '$vlostdate', '$vlostlocation', '$vimagepath', '$vstatus')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Item Saved.');</script>";
    echo "<meta http-equiv='refresh' content='.000001;url=item-main.php' />";
} else {
    echo "Error: " . $conn->error;
}
?>
