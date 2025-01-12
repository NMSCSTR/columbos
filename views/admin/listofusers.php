<?php include '../../includes/admin_header.php'; ?>
<title>List of Users</title>
<?php include '../../includes/admin_sidebar.php'; ?>

<!-- Page Content -->

<div class="container-fluid px-4">
    <!-- <h3 class="fs-2 mb-3">List of users</h3> -->
    <div class="card p-3">
        <div class="table-responsive">
            <table id="example" class="table table-bordered  table-sm display responsive nowrap caption-top"
                style="width:100%">
                <caption>List of users</caption>
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
                        <td><span
                                class="badge <?php echo $user['status'] == 'approved' ? 'text-bg-success shadow p-2' : ($user['status'] == 'pending' ? 'text-bg-warning shadow p-2' : ''); ?>">
                                <?php echo strtoupper($user['status']); ?>
                            </span>
                        </td>
                        <td><?php echo $user['firstname'] ?></td>
                        <td><?php echo $user['lastname'] ?></td>
                        <td><?php echo $user['kcfapicode'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['phone_number'] ?></td>
                        <td><?php echo $user['role'] ?></td>

                        <td>
                            <button onclick="deleteUser(<?php echo $user['id']; ?>)" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                            <button onclick="approvedUser(<?php echo $user['id']; ?>)" class="btn btn-success btn-sm">
                                Approve
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

<script>
function approvedUser(userId) {
    const BASE_URL = "<?php echo BASE_URL; ?>";
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, approve it!',
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(`${BASE_URL}/api/authApiController.php?action=approvedUser`, {
                    id: userId
                })
                .then(response => {
                    if (response.data.success) {
                        console.log(response.data);
                        Swal.fire('Approved!', response.data.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        console.log(response.data);
                        Swal.fire('Error', response.data.message, 'error');
                    }
                })
                .catch(() => Swal.fire('Error', 'An unexpected error occurred.', 'error'));
        }
    });
}

function deleteUser(userId) {

    const BASE_URL = "<?php echo BASE_URL; ?>";
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(`${BASE_URL}/api/authApiController.php?action=deleteUser`, {
                    id: userId
                })
                .then(response => {
                    if (response.data.success) {
                        console.log(response.data);
                        Swal.fire('Deleted!', response.data.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        console.log(response.data);
                        Swal.fire('Error', response.data.message, 'error');
                    }
                })
                .catch(() => Swal.fire('Error', 'An unexpected error occurred.', 'error'));
        }
    });
}
</script>


<?php include '../../includes/admin_footer.php'; ?>