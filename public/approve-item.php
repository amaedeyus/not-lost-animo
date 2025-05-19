<?php
require("../include/conn.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["item_index"])) {
    $itemIndex = intval($_POST["item_index"]);

    // Update status to 'Lost' and approved to 1
    $sql = "UPDATE item_submission SET status = 'Lost', approved = 1 WHERE item_index = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $itemIndex);

    if ($stmt->execute()) {
        // Redirect to main staff item list or confirmation page
        header("Location: staff-item-main.php");
        exit();
    } else {
        echo "Error approving item: " . $conn->error;
    }
}
?>
