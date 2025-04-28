<?php
include dirname(__FILE__) . '/../connection/db.php';  

// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header('Location: ' . BASE_URL . 'views/auth/signin.php');
//     exit;
// }


// $user_id = $_SESSION['user_id'];
// $fetch_user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
// $user = mysqli_fetch_assoc($fetch_user);
// $count_unit_managers = mysqli_query($conn, "SELECT * FROM users WHERE role = 'unit-manager'");
// $count_fraternal_counselors = mysqli_query($conn, "SELECT * FROM users WHERE role = 'fraternal-counselor'");
// $count_members = mysqli_query($conn, "SELECT * FROM users WHERE role = 'member'");

// $count_unit_managers = mysqli_num_rows($count_unit_managers);
// $count_fraternal_counselors = mysqli_num_rows($count_fraternal_counselors);
// $count_members = mysqli_num_rows($count_members);



// ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://localhost/kcfapi_app/resources/images/kcf.png" type="image/x-icon">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- SweatAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include DataTables CSS and JS -->
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowreorder/1.3.0/css/rowReorder.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">


    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Custom CSS -->
    <style>
    * {
        font-family: 'Poppins', sans-serif;
    }

    :root {
        --main-bg-color: rgb(255, 255, 255);
        --main-text-color: rgb(0, 0, 0);
        --second-text-color: #bbbec5;
        --second-bg-color: rgb(225, 225, 225);
    }

    .primary-text {
        color: var(--main-text-color);
    }

    .second-text {
        color: var(--second-text-color);
    }

    .primary-bg {
        background-color: var(--main-bg-color);
    }

    .secondary-bg {
        background-color: var(--second-bg-color);
    }

    .rounded-full {
        border-radius: 100%;
    }

    #wrapper {
        overflow-x: hidden;
        background-image: linear-gradient(to right,
                rgb(255, 255, 255),
                rgb(241, 241, 241),
                rgb(255, 255, 255),
                rgb(255, 255, 255),
                rgb(232, 232, 232));
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin 0.25s ease-out;
        -moz-transition: margin 0.25s ease-out;
        -o-transition: margin 0.25s ease-out;
        transition: margin 0.25s ease-out;
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
        width: 15rem;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    #menu-toggle {
        cursor: pointer;
    }

    .list-group-item {
        border: none;
        padding: 20px 30px;
    }

    .list-group-item.active {
        background-color: transparent;
        color: var(--main-text-color);
        font-weight: bold;
        border: none;
    }

    /* plandetails */

    .card-title {
        color: #333;
        font-weight: bold;
    }

    .card-text {
        color: #555;
        line-height: 1.5;
    }


    /* plandetails */

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
    }
    </style>
</head>

<body>



    <div class="d-flex" id="wrapper">