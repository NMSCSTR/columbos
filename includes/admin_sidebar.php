<!-- Sidebar -->
<div class="bg-transparent shadow w-50" id="sidebar-wrapper">
    <img src="http://localhost/kcfapi_app/resources/images/kcf.png" class="img-fluid d-block mx-auto mt-3" width="50" alt=""
        srcset="">

    <!-- <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">KCFAPI</div> -->
    <div class="list-group list-group-flush my-3">
        <a href="<?= BASE_URL ?>views/admin/dashboard.php"
            class="list-group-item list-group-item-action second-text fw-bold text-decoration-none py-3 px-4"><i
                class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="<?= BASE_URL ?>views/admin/councils.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-decoration-none py-3 px-4"><i
                class="fas fa-project-diagram me-2"></i>Councils</a>
        <a href="<?= BASE_URL ?>views/admin/fraternal_benefits.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-decoration-none py-3 px-4"><i
                class="fas fa-chart-line me-2"></i>Fraternal Benifits</a>
        <a href="<?= BASE_URL ?>views/admin/forms.php" class="list-group-item bg-transparent second-text fw-bold text-decoration-none py-3 px-4"><i
                class="fas fa-paperclip me-2"></i>Forms</a>
        <a href="<?= BASE_URL ?>views/admin/listofusers.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-decoration-none py-3 px-4">
            <i class="fas fa-user me-2"></i>Users
        </a>

        <a href="<?= BASE_URL ?>views/admin/meetings.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-decoration-none py-3 px-4"><i
                class="fas fa-comment-dots me-2"></i>Meetings</a>
        <a href="#"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-decoration-none py-3 px-4"><i
                class="fas fa-map-marker-alt me-2"></i>Applications</a>
        <a href="<?= BASE_URL ?>views/admin/profile.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-decoration-none py-3 px-4"><i class="fas fa-user-circle me-2"></i>Profile</a>
        <a href="<?= BASE_URL ?>api/logout.php"
            class="list-group-item list-group-item-action bg-transparent text-danger fw-bold text-decoration-none py-3 px-4"><i
                class="fas fa-power-off me-2"></i>Logout</a>
    </div>
</div>

<!-- /#sidebar-wrapper -->

<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h4 class="fs-4 m-0 fw-bolder" style="color:rgb(6, 3, 148);">Knights of Columbus Fraternal Association of the Philippines Inc.</h4>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2"></i><?php echo $user['firstname'] . ' ' . $user['lastname'];?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>views/admin/profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" onclick="logout()">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>