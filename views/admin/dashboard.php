<?php include '../../includes/admin_header.php'; ?> 
<title>Admin</title>
<?php include '../../includes/admin_sidebar.php'; ?>


<!-- Page Content -->

    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3">
                <div class="p-3 bg-white shadow d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $count_unit_managers?></h3>
                        <p class="fs-5">Unit Managers</p>
                    </div>
                    <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $count_fraternal_counselors?></h3>
                        <p class="fs-5">Fraternal Counselors</p>
                    </div>
                    <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $count_members?></h3>
                        <p class="fs-5">Members</p>
                    </div>
                    <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">%25</h3>
                        <p class="fs-5">Plans</p>
                    </div>
                    <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <h3 class="fs-4 mb-3">Recent Orders</h3>
            <div class="col">

            </div>
        </div>

    </div>

<!-- /#page-content-wrapper -->

<?php include '../../includes/admin_footer.php'; ?>