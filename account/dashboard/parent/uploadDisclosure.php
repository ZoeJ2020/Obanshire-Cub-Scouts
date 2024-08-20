<?php
session_start();
include '../../../account/auth/dbConfig.php';
$id = $_SESSION['id'];

$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $stmt = $conn->prepare("INSERT INTO disclosure (file_name, fk_dis_user_id) VALUES (?, ?)");
            $stmt->bind_param("si", $fileName, $id);
            if ($stmt->execute()) {
                // Success message here
            } else {
                // Failure message here
                die("Error: " . $stmt->error);
            }
        }
    }
}

header('Location: ../parent');
?>
