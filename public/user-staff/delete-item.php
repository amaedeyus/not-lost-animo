<?php
require("../include/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item_index"])) {
    $itemIndex = $conn->real_escape_string($_POST["item_index"]);

    $sql = "DELETE FROM item_submission WHERE item_index = '$itemIndex'";
    if ($conn->query($sql) === TRUE) {
        // Redirect to passed URL if it exists, else fallback
        $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : 'staff-pending-item-main.php';
        header("Location: $redirect?deleted=1");
        exit();
    } else {
        echo "Error deleting item: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
