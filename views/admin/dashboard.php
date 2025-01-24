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
        <h3 class="fs-4 mb-3">Users logs</h3>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered display responsive nowrap caption-top"
                            style="width:100%">
                            <caption><i class="fas fa-list"></i> List of users logs</caption>
                            <hr class="border border-primary border-3 opacity-75">
                            <thead class="table-dark">
                                <tr>
                                    <th>USER</th>
                                    <th>ROLE</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $fetch_logs = mysqli_query($conn, "SELECT * FROM logs ORDER BY id DESC");
                                        while ($log = mysqli_fetch_assoc($fetch_logs)) { ?>
                                <tr>
                                    <td><?php echo $log['user'] ?></td>
                                    <td><?php echo $log['role'] ?></td>
                                    <td><?php echo $log['date'] ?></td>
                                    <td><?php echo $log['time'] ?></td>
                                </tr>
                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <th>USER</th>
                                    <th>ROLE</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- /#page-content-wrapper -->

        <?php include '../../includes/admin_footer.php'; ?>