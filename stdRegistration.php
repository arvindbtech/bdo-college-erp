<?php
session_start();
include 'config/db.php';
//include 'error_log.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'login':
            login();
    }
}

// Student registration
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'addRegistration':
            studentRegistration(); 
            break; 
        default:
            echo "Invalid action"; // Handle undefined actions
            break;
    }
}

function studentRegistration()
{
    global $conn; 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);   
    echo "<pre>"; print_r($_POST);
    $full_name = $_POST['full_name'] ?? null;
    $dob = $_POST['dob'] ?? null;
    $email = $_POST['email'] ?? null;
    $mobile = $_POST['mobile'] ?? null;

    $sql = "INSERT INTO `add_training` (
        `training_hall`, 
        `training_date_from`, 
        `training_date_to`, 
        `department_name`, 
        `training_mode`, 
        `faculty_name`, 
        `number_of_participants`, 
        `training_materials_url`, 
        `training_approval_letter`, 
        `vc_url`, 
        `projector`, 
        `food_beverage`, 
        `accommodation`, 
        `screen`,
        `training_handouts`,
        `training_key_notes`
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
    $stmt = $conn->prepare($sql);

}

?>