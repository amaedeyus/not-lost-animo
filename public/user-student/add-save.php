<?php
require("../include/conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vitemname = $_POST['item_name'];
    $vdescription = $_POST['description'];
    $vlostdate = $_POST['lost_date'];
    $vlostlocation = $_POST['lost_location'];
    $vstatus = "Pending";
    $vimagepath = '';

    if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'media/';
        $imageName = basename($_FILES['image_path']['name']);
        $targetPath = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image_path']['tmp_name'], $targetPath)) {
            $vimagepath = $imageName; // Save image name to DB
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    }

    
$sql = "INSERT INTO item_submission (item_name, description, lost_date, lost_location, image_path, status, approved) 
        VALUES (?, ?, ?, ?, ?, ?, 0)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $vitemname, $vdescription, $vlostdate, $vlostlocation, $vimagepath, $vstatus);

if ($stmt->execute()) {
    echo "<script>alert('Item Saved.');</script>";
    echo "<meta http-equiv='refresh' content='.000001;url=item-main.php' />";
} else {
    echo "Error: " . $stmt->error;
}

}
?>
