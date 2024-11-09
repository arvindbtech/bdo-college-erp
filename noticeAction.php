<?php
session_start();
include '../config/db.php';
//include 'error_log.php';

// Add notice
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'addNotice':
            createNotice(); 
            break;        
        default:
            echo "Invalid action"; // Handle undefined actions
            break;
    }
}

//create notice
function createNotice()
{
    global $conn;
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    $training_title = $_POST['training_title'] ?? null;
    $training_date = $_POST['training_date'] ?? null;
    $training_details = $_POST['training_details'] ?? null;
    
    $new_name = null; // Initialize file path variable
    
    // Handle file upload if a file is provided and there are no errors
    if (isset($_FILES['training_file']) && $_FILES['training_file']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "notice/";
        $file_name = basename($_FILES["training_file"]["name"]);
        $new_name = $target_dir . $file_name;
        
        // Check if directory exists, create if not
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        move_uploaded_file($_FILES["training_file"]["tmp_name"], $new_name);
    }
    
    $sql = "INSERT INTO `add_notice` (
        `training_title`, 
        `training_date`, 
        `training_details`, 
        `training_file`
    ) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        $_SESSION['error'] = "Error preparing the statement: " . $conn->error;
        return;
    }
    
    $stmt->bind_param(
        "ssss",
        $training_title,
        $training_date,
        $training_details,
        $new_name // Path of the uploaded file
    );
    
    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success'] = "Notice created successfully!";
        header("Location: noticeList.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: addNotice.php");
        exit();
    }
}



   
   
    
    // Close the statement
   // $stmt->close();
