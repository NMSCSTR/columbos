<?php 
session_start();
include '../connection/db.php';
header("Content-Type: application/json");

$response = ['success' => false, 'message' => 'Invalid Request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $data = json_decode(file_get_contents("php://input"), true);

    if ($action == 'addCouncil') {
        $council_number = $data['council_number'] ?? '';
        $council_name = $data['council_name'] ?? '';
        $unit_manager_id = $data['unit_manager_id'] ?? '';
        $fraternal_counselor_id = $data['fraternal_counselor_id'] ?? '';
        $date_established = $data['date_established'] ?? '';

        if (empty($council_number) || empty($council_name) || empty($unit_manager_id) || empty($fraternal_counselor_id) || empty($date_established)) {
            $response['message'] = 'All fields are required.';
        } else {
            $sql = "INSERT INTO council (council_number, council_name, unit_manager_id, fraternal_counselor_id, date_established)
                        VALUES('$council_number','$council_name','$unit_manager_id','$fraternal_counselor_id','$date_established')";

            if (mysqli_query($conn, $sql)) {
                $response['success'] = true;
                $response['message'] = 'Council added successfully';
            } else {
                $response['message'] = 'Council failed to add';
            }
        }
    }

    if ($action == 'updateCouncil') {
        $council_number = $data['council_number'] ?? '';
        $council_name = $data['council_name'] ?? '';
        $unit_manager_id = $data['unit_manager_id'] ?? '';
        $fraternal_counselor_id = $data['fraternal_counselor_id'] ?? '';
        $date_established = $data['date_established'] ?? '';
        $id = $data['council_id'] ?? '';

        if (empty($council_number) || empty($council_name) || empty($unit_manager_id) || empty($fraternal_counselor_id) || empty($date_established) || empty($id)) {
            $response['message'] = 'All fields are required.';
        } else {
            $sql = "UPDATE council SET council_number='$council_number', council_name='$council_name', unit_manager_id='$unit_manager_id', fraternal_counselor_id='$fraternal_counselor_id', date_established='$date_established' WHERE council_id='$id'";

            if (mysqli_query($conn, $sql)) {
                $response['success'] = true;
                $response['message'] = 'Council updated successfully';
            } else {
                $response['message'] = 'Council failed to update';
            }
        }
    }

    if ($action == 'deleteCouncil') {
        $id = $data['councilId'] ?? '';

        if (empty($id)) {
            $response['message'] = 'Council ID is required.';
        } else {
            $sql = "DELETE FROM council WHERE council_id='$id'";

            if (mysqli_query($conn, $sql)) {
                $response['success'] = true;
                $response['message'] = 'Council deleted successfully';
            } else {
                $response['message'] = 'Council failed to delete';
            }
        }
    }
    echo json_encode($response);
}

?>