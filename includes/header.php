<?php define('BASE_URL', 'http://localhost/columbos/'); ?>

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


    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- SweatAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>


    <!-- Custom CSS -->
    <style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    </style>

    <title>Columbos App</title>
</head>

<body>

<header class="bg-white border-bottom shadow-sm fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="http://localhost/kcfapi_app/resources/images/kcf.png" alt="kcflogo" width="40" height="40"
                class="me-2">
            <span class="fw-semibold text-dark">KCFAPI</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo BASE_URL ?>index.php#hero">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo BASE_URL ?>index.php#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo BASE_URL ?>index.php#fraternal-benifits">Fraternal Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?php echo BASE_URL ?>index.php#contact">Contact</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="<?php echo BASE_URL ?>views/auth/signin.php" class="btn btn-outline-primary me-2">Login</a>
                <a href="<?php echo BASE_URL ?>views/auth/signup.php" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </nav>
</header>

