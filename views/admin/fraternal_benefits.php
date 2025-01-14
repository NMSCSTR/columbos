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
                        <th>STATUS</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>KCFAPICODE</th>
                        <th>EMAIL</th>
                        <th>PHONE NUMBER</th>
                        <th>ROLE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $fetch_users = mysqli_query($conn, "SELECT * FROM users WHERE role != 'admin'");
                        while ($user = mysqli_fetch_assoc($fetch_users)) { ?>

                    <tr>
                        <td><span  style="width: 120px; height: 40px; display: flex; justify-content: center; align-items: center; text-transform: uppercase;"
                                class="badge <?php echo $user['status'] == 'approved' ? 'text-bg-success shadow p-2' : ($user['status'] == 'pending' ? 'text-bg-warning shadow p-2' : ''); ?>">
                                <?php echo strtoupper($user['status']); ?>
                            </span>
                        </td>
                        <td><?php echo $user['firstname'] ?></td>
                        <td><?php echo $user['lastname'] ?></td>
                        <td><?php echo $user['kcfapicode'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['phone_number'] ?> <span><i class="fas fa-message float-end text-primary"></i></span></td>
                        <td><?php echo ucfirst($user['role']) ?></td>

                        <td>
                            <button onclick="deleteUser(<?php echo $user['id']; ?>)" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            <button onclick="approvedUser(<?php echo $user['id']; ?>)" class="btn btn-success btn-sm">
                                <i class="fas fa-check"></i> Approve
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                <tfoot>
                    <tr>
                        <th>STATUS</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>KCFAPICODE</th>
                        <th>EMAIL</th>
                        <th>PHONE NUMBER</th>
                        <th>ROLE</th>
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