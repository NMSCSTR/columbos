# columbos
<!-- <?php 
session_start();
include '../connection/db.php';
header("Content-Type: application/json");

$response = ['success' => false, 'message' => 'Invalid Request'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
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
            $uploadDir = '../uploads/' . str_replace(' ', '_', $type); // Folder for specific plan type
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

    
    
} elseif ($method === 'DELETE') {
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
    if (!empty($id)) {
        $sql = "SELECT * FROM fraternal_benefits WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $plan = mysqli_fetch_assoc($result);
            $image = BASE_URL . $plan['image'];
            if (file_exists($image)) {
                unlink($image);
            }
            $sql = "DELETE FROM fraternal_benefits WHERE id = '$id'";
            if (mysqli_query($conn, $sql)) {
                $response['success'] = true;
                $response['message'] = 'Plan deleted successfully';
            } else {
                $response['message'] = 'Plan failed to delete: ' . mysqli_error($conn);
            }
        } else {
            $response['message'] = 'Plan not found';
        }
    } else {
        $response['message'] = 'Invalid plan ID';
    }
} elseif ($method === 'PUT') {
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
    if (!empty($id)) {
        $data = json_decode(file_get_contents('php://input'), true);
        $type = isset($data['type']) ? mysqli_real_escape_string($conn, $data['type']) : '';
        $name = isset($data['name']) ? mysqli_real_escape_string($conn, $data['name']) : '';
        $about = isset($data['about']) ? mysqli_real_escape_string($conn, $data['about']) : '';
        $benefits = isset($data['benefits']) ? mysqli_real_escape_string($conn, $data['benefits']) : '';
        $contribution_period = isset($data['contribution_period']) ? mysqli_real_escape_string($conn, $data['contribution_period']) : '';
        
        if (empty($type) || empty($name) || empty($about) || empty($benefits) || empty($contribution_period)) {
            $response['message'] = 'All fields are required.';
        } else {
            $sql = "UPDATE fraternal_benefits SET type = '$type', name = '$name', about = '$about', benefits = '$benefits', contribution_period = '$contribution_period' WHERE id = '$id'";
            if (mysqli_query($conn, $sql)) {
                $response['success'] = true;
                $response['message'] = 'Plan updated successfully';
            } else {
                $response['message'] = 'Plan failed to update: ' . mysqli_error($conn);
            }
        }
    } else {
        $response['message'] = 'Invalid plan ID';
    }
}


mysqli_close($conn);


echo json_encode($response);
?> -->