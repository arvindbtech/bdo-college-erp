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



// Function for handling login
function login()
{
    global $conn;
    session_start(); // Ensure the session is started

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        $_SESSION['message'] = "Internal server error!";
        header('Location: index.php');
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        //echo "<pre>"; print_r($user); die();
        if ($password === $user['password']) {
            session_regenerate_id(true);
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['message'] = "Login successful!";
            header('Location: dashboard.php');
            exit();
        } else {
            error_log("Incorrect password attempt for user: $username");
            $_SESSION['message'] = "Incorrect password!";
            header('Location: index.php');
            exit();
        }
    } else {
        error_log("User not found: $username");
        $_SESSION['message'] = "User not found!";
        header('Location: index.php');
        exit();
    }
}
// Add training
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'addTraining':
            training(); 
            break; 
        case 'editTraining':
            if (isset($_POST['training_id'])) {
                $training_id = filter_input(INPUT_POST, 'training_id', FILTER_SANITIZE_NUMBER_INT); // Sanitize the input
                editTraining($training_id);
            } else {
                echo "Training ID is required for editing.";
            }
            break;
        default:
            echo "Invalid action"; // Handle undefined actions
            break;
    }
}


// add training

function training()
{
    global $conn; 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);   
    $training_hall = $_POST['training_hall'] ?? null;
    $department_name = $_POST['department_name'] ?? null;
    $training_date_from = $_POST['training_date_from'] ?? null;
    $training_date_to = $_POST['training_date_to'] ?? null;
    $training_mode = $_POST['training_mode'] ?? null;
    $faculty_name = $_POST['faculty_name'] ?? null;
    $number_of_participants = $_POST['number_of_participants'] ?? null;
    $training_materials_url = $_POST['training_materials_url'] ?? null;
    $vc_url = $_POST['vc_url'] ?? null;
    $projector = isset($_POST['projector']) ? 1 : 0;
    $food_beverage = isset($_POST['food_beverage']) ? 1 : 0; 
    $accommodation = isset($_POST['accommodation']) ? 1 : 0; 
    $screen = isset($_POST['screen']) ? 1 : 0; 
    $training_handouts = isset($_POST['training_handouts']) ? 1 : 0;
    $training_key_notes = isset($_POST['training_key_notes']) ? 1 : 0;       
    if (isset($_FILES['training_approval_letter']) && $_FILES['training_approval_letter']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $new_name = $target_dir . basename($_FILES["training_approval_letter"]["name"]);
        move_uploaded_file($_FILES["training_approval_letter"]["tmp_name"], $new_name);
    } else {
        $new_name = null; 
    }
 
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
    
    if ($stmt === false) {
        $_SESSION['error'] = "Error preparing the statement: " . $conn->error;
        return;
    }
   
    $stmt->bind_param(
        "ssssssisssssssss", 
        $training_hall, 
        $training_date_from, 
        $training_date_to, 
        $department_name, 
        $training_mode, 
        $faculty_name, 
        $number_of_participants, 
        $training_materials_url, 
        $new_name, // Path of the uploaded file
        $vc_url, 
        $projector, 
        $food_beverage, 
        $accommodation, 
        $screen,
        $training_handouts,
        $training_key_notes
    );

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success'] = "Training added successfully!";
        header("Location: trainingList.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: addTraining.php");
        exit();
    }
}

//edit training
function editTraining($training_id)
{
    global $conn; 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);   
    $training_hall = htmlspecialchars($_POST['training_hall'] ?? null);
    $department_name = htmlspecialchars($_POST['department_name'] ?? null);
    $training_date_from = htmlspecialchars($_POST['training_date_from'] ?? null);
    $training_date_to = htmlspecialchars($_POST['training_date_to'] ?? null);
    $training_mode = htmlspecialchars($_POST['training_mode'] ?? null);
    $faculty_name = htmlspecialchars($_POST['faculty_name'] ?? null);
    $number_of_participants = intval($_POST['number_of_participants'] ?? 0);
    $training_materials_url = filter_var($_POST['training_materials_url'], FILTER_SANITIZE_URL);
    $vc_url = filter_var($_POST['vc_url'], FILTER_SANITIZE_URL);
    $projector = isset($_POST['projector']) ? 1 : 0;
    $food_beverage = isset($_POST['food_beverage']) ? 1 : 0; 
    $accommodation = isset($_POST['accommodation']) ? 1 : 0; 
    $screen = isset($_POST['screen']) ? 1 : 0; 
    $training_handouts = isset($_POST['training_handouts']) ? 1 : 0;
    $training_key_notes = isset($_POST['training_key_notes']) ? 1 : 0;
    $stmt = $conn->prepare("SELECT training_approval_letter FROM `add_training` WHERE id = ?");
    $stmt->bind_param("i", $training_id);
    $stmt->execute();
    $stmt->bind_result($existing_file);
    $stmt->fetch();
    $stmt->close();
    $new_name = $existing_file;

    if (isset($_FILES['training_approval_letter']) && $_FILES['training_approval_letter']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["training_approval_letter"]["name"]);
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_types = ['pdf', 'doc', 'docx'];
        $max_size = 5 * 1024 * 1024; // 5MB file size limit
        
        if ($_FILES['training_approval_letter']['size'] > $max_size) {
            $_SESSION['error'] = "File size exceeds the limit of 5MB.";
            header("Location: editTraining.php?id=$training_id");
            exit();
        }

        if (in_array($file_type, $allowed_types)) {
            $new_name = $target_dir . uniqid() . '.' . $file_type; // Unique filename to avoid overwriting
            if (!move_uploaded_file($_FILES["training_approval_letter"]["tmp_name"], $new_name)) {
                $_SESSION['error'] = "File upload failed!";
                header("Location: editTraining.php?id=$training_id");
                exit();
            }
        } else {
            $_SESSION['error'] = "Invalid file type. Only PDF, DOC, and DOCX are allowed.";
            header("Location: editTraining.php?id=$training_id");
            exit();
        }
    }

    // Update query
    $sql = "UPDATE `add_training` SET 
        `training_hall` = ?, 
        `training_date_from` = ?, 
        `training_date_to` = ?, 
        `department_name` = ?, 
        `training_mode` = ?, 
        `faculty_name` = ?, 
        `number_of_participants` = ?, 
        `training_materials_url` = ?, 
        `training_approval_letter` = ?, 
        `vc_url` = ?, 
        `projector` = ?, 
        `food_beverage` = ?, 
        `accommodation` = ?, 
        `screen` = ?, 
        `training_handouts` = ?, 
        `training_key_notes` = ? 
        WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        $_SESSION['error'] = "Error preparing the statement: " . $conn->error;
        return;
    }
    $stmt->bind_param(
        "ssssssisssssssssi", 
        $training_hall, 
        $training_date_from, 
        $training_date_to, 
        $department_name, 
        $training_mode, 
        $faculty_name, 
        $number_of_participants, 
        $training_materials_url, 
        $new_name, 
        $vc_url, 
        $projector, 
        $food_beverage, 
        $accommodation, 
        $screen,
        $training_handouts,
        $training_key_notes,
        $training_id
    );
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Training updated successfully!";
        header("Location: trainingList.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
        header("Location: editTraining.php?id=$training_id");
        exit();
    }
}

   
   
    
    // Close the statement
   // $stmt->close();
