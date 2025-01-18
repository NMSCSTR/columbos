<?php 
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
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
    echo json_encode($response); // Return the JSON response
}

?>