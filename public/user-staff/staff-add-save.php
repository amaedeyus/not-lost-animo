<?php
session_start();
require("../include/conn.php");

if (!isset($_SESSION['user_index'])) {
    header("Location: ../system-login/front-end.html");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Lost Animo - Processing</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/custom-alert.css?v=<?= time() ?>">
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vitemname = $_POST['item_name'];
    $vdescription = $_POST['description'];
    $vlostdate = $_POST['lost_date'];
    $vlostlocation = $_POST['lost_location'];
    $vstatus = "Lost";
    $vimagepath = '';
    $user_index = $_SESSION['user_index'];

    if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../media/item-image/';
        $imageName = basename(  $_FILES['image_path']['name']);
        $targetPath = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image_path']['tmp_name'], $targetPath)) {
            $vimagepath = 'item-image/' . $imageName;
        } else {
            echo '<div class="custom-alert-overlay">
                    <div class="custom-alert error">
                        <span class="icon material-icons">error</span>
                        <div class="message">Failed to upload image.</div>
                        <div class="buttons">
                            <button class="close-btn" onclick="closeAlert()">Close</button>
                        </div>
                    </div>
                  </div>';
            exit;
        }
    }

    $sql = "INSERT INTO item_submission (item_name, description, lost_date, lost_location, image_path, status, approved, user_submit_index) 
            VALUES (?, ?, ?, ?, ?, ?, 1, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $vitemname, $vdescription, $vlostdate, $vlostlocation, $vimagepath, $vstatus, $user_index);

    if ($stmt->execute()) {
        echo '<div class="custom-alert-overlay">
                <div class="custom-alert success">
                    <span class="icon material-icons">check_circle</span>
                    <div class="message">Item successfully saved!</div>
                    <div class="buttons">
                        <button class="confirm-btn" onclick="redirectToMain()">Continue</button>
                    </div>
                </div>
              </div>';
    } else {
        echo '<div class="custom-alert-overlay">
                <div class="custom-alert error">
                    <span class="icon material-icons">error</span>
                    <div class="message">Error: ' . $stmt->error . '</div>
                    <div class="buttons">
                        <button class="close-btn" onclick="closeAlert()">Close</button>
                    </div>
                </div>
              </div>';
    }
}
?>

<script>
function closeAlert() {
    const overlay = document.querySelector('.custom-alert-overlay');
    const alert = document.querySelector('.custom-alert');
    
    overlay.style.animation = 'fadeOut 0.3s ease-out forwards';
    alert.style.animation = 'scaleOut 0.3s ease-out forwards';
    
    setTimeout(() => {
        window.history.back();
    }, 300);
}

function redirectToMain() {
    window.location.href = 'staff-item-main.php';
}
</script>

</body>
</html>
