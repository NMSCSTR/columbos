<?php 
session_start();
include '../connection/db.php';
header("Content-Type: application/json");

$response = ['success' => false, 'message' => 'Invalid Request'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    
    if ($action == 'addPlan') {
        $type = isset($_POST['type']) ? mysqli_real_escape_string($conn, $_POST['type']) : '';
        $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
        $about = isset($_POST['about']) ? mysqli_real_escape_string($conn, $_POST['about']) : '';
        $benefits = isset($_POST['benefits']) ? mysqli_real_escape_string($conn, $_POST['benefits']) : '';
        $contribution_period = isset($_POST['contribution_period']) ? mysqli_real_escape_string($conn, $_POST['contribution_period']) : '';

        if (empty($type) || empty($name) || empty($about) || empty($benefits) || empty($contribution_period)) {
            $response['message'] = 'All fields are required.';
        } elseif (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            $uploadDir = '../uploads/' . str_replace(' ', '_', $type);
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $imageDestination = $uploadDir . '/' . uniqid() . '.' . $imageExtension;

            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                $created_at = $updated_at = date('Y-m-d H:i:s');

                $sql = "INSERT INTO `fraternal_benefits`(`type`, `name`, `about`, `benefits`, `contribution_period`, `image`, `created_at`, `updated_at`) 
                        VALUES ('$type', '$name', '$about', '$benefits', '$contribution_period', '$imageDestination', '$created_at', '$updated_at')";
                
                if (mysqli_query($conn, $sql)) {
                    $response['success'] = true;
                    $response['message'] = 'Plan added successfully';
                } else {
                    error_log('MySQL Error: ' . mysqli_error($conn));
                    $response['message'] = 'Plan failed to add.';
                }
            } else {
                $response['message'] = 'Image upload failed.';
            }
        } else {
            $response['message'] = 'No image file or invalid image upload.';
        }
    }
} elseif ($method === 'DELETE') {
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
    if (!empty($id)) {
        $sql = "SELECT * FROM fraternal_benefits WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $plan = mysqli_fetch_assoc($result);
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $plan['image'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $sql = "DELETE FROM fraternal_benefits WHERE id = '$id'";
            if (mysqli_query($conn, $sql)) {
                $response['success'] = true;
                $response['message'] = 'Plan deleted successfully.';
            } else {
                error_log('MySQL Error: ' . mysqli_error($conn));
                $response['message'] = 'Plan failed to delete.';
            }
        } else {
            $response['message'] = 'Plan not found.';
        }
    } else {
        $response['message'] = 'Invalid plan ID.';
    }
} elseif ($method === 'PUT') {
    parse_str(file_get_contents('php://input'), $data);
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
    $type = isset($data['type']) ? mysqli_real_escape_string($conn, $data['type']) : '';
    $name = isset($data['name']) ? mysqli_real_escape_string($conn, $data['name']) : '';
    $about = isset($data['about']) ? mysqli_real_escape_string($conn, $data['about']) : '';
    $benefits = isset($data['benefits']) ? mysqli_real_escape_string($conn, $data['benefits']) : '';
    $contribution_period = isset($data['contribution_period']) ? mysqli_real_escape_string($conn, $data['contribution_period']) : '';

    if (!empty($id) && !empty($type) && !empty($name) && !empty($about) && !empty($benefits) && !empty($contribution_period)) {
        $sql = "UPDATE fraternal_benefits SET type = '$type', name = '$name', about = '$about', benefits = '$benefits', contribution_period = '$contribution_period' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            $response['success'] = true;
            $response['message'] = 'Plan updated successfully.';
        } else {
            error_log('MySQL Error: ' . mysqli_error($conn));
            $response['message'] = 'Plan failed to update.';
        }
    } else {
        $response['message'] = 'Invalid input or missing data.';
    }
}

mysqli_close($conn);

echo json_encode($response);
?>

myHotspot