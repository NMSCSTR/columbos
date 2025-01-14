<?php include '../../includes/admin_header.php'; ?>
<title>Fraternal Benifits</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->

<div class="container-fluid">
    <div class="d-flex justify-content-start">
        <button class="btn btn-success mb-3 shadow" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <i class="fas fa-plus"></i> Add Plan
        </button>
    </div>
    <div class="card p-3 shadow">
    <div class="table-responsive">
            <table id="example" class="table table-bordered  table-sm display responsive nowrap caption-top"
                style="width:100%">
                <caption><i class="fas fa-list"></i> List of users</caption>
                <hr class="border border-primary border-3 opacity-75">
                <thead class="table-dark">
                    <tr>
                        <th>TYPE</th>
                        <th>NAME</th>
                        <th>ABOUT</th>
                        <th>BENEFITS</th>
                        <th>CONTRIBUTION PERIOD</th>
                        <th>IMAGE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $fetch_plan = mysqli_query($conn, "SELECT * FROM fraternal_benifits");
                        while ($plan = mysqli_fetch_assoc($fetch_plan)) { ?>

                    <tr>
                       
                        <td><?php echo $plan['firstname'] ?></td>
                        <td><?php echo $plan['lastname'] ?></td>
                        <td><?php echo $plan['kcfapicode'] ?></td>
                        <td><?php echo $plan['email'] ?></td>
                        <td><?php echo $plan['phone_number'] ?> <span><i class="fas fa-message float-end text-primary"></i></span></td>
                        <td><?php echo ucfirst($user['role']) ?></td>

                        <td>
                            <button onclick="deletePlan(<?php echo $plan['id']; ?>)" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                <tfoot>
                    <tr>
                    <th>TYPE</th>
                        <th>NAME</th>
                        <th>ABOUT</th>
                        <th>BENEFITS</th>
                        <th>CONTRIBUTION PERIOD</th>
                        <th>IMAGE</th>
                        <th>ACTIONS</th>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /#page-content-wrapper -->


<?php include '../../includes/admin_footer.php'; ?>