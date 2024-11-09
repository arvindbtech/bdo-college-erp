<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
include '../config/db.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $sql = "DELETE FROM `add_notice` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $_SESSION['error'] = "Error preparing the statement: " . $conn->error;
        header("Location: trainingList.php"); 
        exit();
    }
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Notice deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting the training: " . $stmt->error;
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "No training ID provided!";
}

header("Location: noticeList.php");
exit();
?>
