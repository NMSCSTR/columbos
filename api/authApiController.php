<?php
session_start();
include '../connection/db.php';
header("Content-Type: application/json");


$response = ['success' => false, 'message' => 'Invalid Request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $data = json_decode(file_get_contents("php://input"), true);

    if($action == 'register') {

        $firstname = $data['firstname'] ?? '';
        $lastname = $data['lastname'] ?? '';
        $kcfapicode = $data['kcfapicode'] ?? '';
        $email = $data['email'] ?? '';
        $phone_number = $data['phone_number'] ?? '';
        $role = $data['role'] ?? '';
        $password = $data['password'] ?? '';
        $password_confirmation = $data['password_confirmation'] ?? '';

        if (empty($firstname) || empty($lastname) || empty($kcfapicode) || empty($email)|| empty($phone_number) || empty($role) || empty($password) || empty($password_confirmation)) {
            $response['message'] = 'All fields are required.';
        } elseif ($password !== $password_confirmation) {
            $response['message'] = 'Password do not match.';
        } else {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (firstname, lastname, kcfapicode, email, phone_number, role, password)
                        VALUES('$firstname','$lastname','$kcfapicode','$email','$phone_number','$role','$hash_password')";

            if (mysqli_query($conn, $sql)) {
                $response['success'] = true;
                $response['message'] = 'Registration successful';
            }
            else {
                $response['message'] = 'Registration failed';
            }
        }

    } 

    if ($action == 'login') {
        $email = $data['email'];
        $password = $data['password'];

        if (empty($email) || empty($password)) {
            $response['message'] = 'Email and Password are required';
        } else {
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['password'])) {
                    $response['success'] = true;
                    $response['message'] = 'Login successful';
                    $_SESSION['user'] = $user;
                    $_SESSION['role'] = $user['role'];
                } else {
                    $response['message'] = 'Invalid email or password';
                }
            } else {
                $response['message'] = 'Invalid email or password';
            }
        }

    }

    
    echo json_encode($response);
}