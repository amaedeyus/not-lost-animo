<?php
require("../include/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item_index"], $_POST["status"])) {
    $itemIndex = $conn->real_escape_string($_POST["item_index"]);
    $newStatus = $conn->real_escape_string($_POST["status"]);

    $sql = "UPDATE item_submission SET status = '$newStatus' WHERE item_index = '$itemIndex'";
    if ($conn->query($sql) === TRUE) {
        header("Location: {$_SERVER['HTTP_REFERER']}?updated=1");
        exit();
    } else {
        echo "Error updating item: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
