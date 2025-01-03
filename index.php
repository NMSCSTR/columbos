<?php
include 'includes/header.php';
?>

<!-- Main content of the page -->
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
                    <a class="nav-link text-dark" href="#hero">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#fraternal-benifits">Fraternal Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#contact">Contact</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="" class="btn btn-outline-primary me-2">Login</a>
                <a href="" class="btn btn-primary">Get Started</a>
            </div>
        </div>
    </nav>
</header>


<?php
include 'includes/footer.php';
?>