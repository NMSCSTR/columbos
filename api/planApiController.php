<?php 
session_start();
include '../connection/db.php';
header("Content-Type: application/json");

$response = ['success' => false, 'message' => 'Invalid Request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    
    // Check if action is 'addPlan'
    if ($action == 'addPlan') {
        // Collect form data from $_POST and escape special characters
        $type = isset($_POST['type']) ? mysqli_real_escape_string($conn, $_POST['type']) : '';
        $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
        $about = isset($_POST['about']) ? mysqli_real_escape_string($conn, $_POST['about']) : '';
        $benefits = isset($_POST['benefits']) ? mysqli_real_escape_string($conn, $_POST['benefits']) : '';
        $contribution_period = isset($_POST['contribution_period']) ? mysqli_real_escape_string($conn, $_POST['contribution_period']) : '';
        
        // Check if all the required fields are present
        if (empty($type) || empty($name) || empty($about) || empty($benefits) || empty($contribution_period)) {
            $response['message'] = 'All fields are required.';
        } elseif (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Handle image upload
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            // Set upload folder based on the type
            $uploadDir = 'uploads/' . str_replace(' ', '_', $type); // Folder for specific plan type
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Create the folder if it doesn't exist
            }

            // Define the destination path for the image
            $imageDestination = $uploadDir . '/' . uniqid() . '.' . $imageExtension;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                $created_at = $updated_at = date('Y-m-d H:i:s');

                // Insert the plan data into the database
                $sql = "INSERT INTO `fraternal_benefits`(`type`, `name`, `about`, `benefits`, `contribution_period`, `image`, `created_at`, `updated_at`) 
                        VALUES ('$type', '$name', '$about', '$benefits', '$contribution_period', '$imageDestination', '$created_at', '$updated_at')";
                
                if (mysqli_query($conn, $sql)) {
                    $response['success'] = true;
                    $response['message'] = 'Plan added successfully';
                } else {
                    $response['message'] = 'Plan failed to add: ' . mysqli_error($conn);
                }
            } else {
                $response['message'] = 'Image upload failed';
            }
        } else {
            $response['message'] = 'No image file or invalid image upload';
        }
    }
}

mysqli_close($conn);

// Send JSON response
echo json_encode($response);
?>
